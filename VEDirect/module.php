<?php

declare(strict_types=1);

include_once __DIR__ . '/fields.php';
include_once __DIR__ . '/products.php';
include_once __DIR__ . '/profiles.php';

class VEDirect extends IPSModule
{
    use VEDirectFields;
    use VEDirectProducts;
    use VEDirectProfiles;

    public function Create()
    {
        //Never delete this line!
        parent::Create();

        $this->RegisterPropertyInteger('GatewayMode', 0);
        $this->RegisterPropertyInteger('DeviceType', 0);

        // Imported from the VEDirectProfiles trait!
        $this->RegisterProfiles();
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        //Switch I/O instances
        switch ($this->ReadPropertyInteger('GatewayMode')) {
            case 0:
                $this->ForceParent('{6DC3D946-0D31-450F-A8C6-C42DB8D7D4F1}');
                break;
            case 1:
                $this->ForceParent('{3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}');
                break;
        }
    }

    public function GetConfigurationForParent()
    {
        switch ($this->ReadPropertyInteger('GatewayMode')) {
            case 0:
                return json_encode([
                    'BaudRate' => '19200',
                    'StopBits' => '1',
                    'DataBits' => '8',
                    'Parity'   => 'None'
                ]);

        }
        return '{}';
    }

    public function ReceiveData($JSONString)
    {
        $searchHeader = "\r\nChecksum\t";

        $data = json_decode($JSONString);

        $this->SendDebug('DATA', utf8_decode($data->Buffer), 0);

        // Concat all data from buffer and received data
        $data = $this->GetBuffer('Data') . utf8_decode($data->Buffer);

        // Do we might have a complete packet?
        $posChecksum = strpos($data, $searchHeader);
        while ($posChecksum !== false) {
            // We need one more character (the checksum) after our packet complete trigger
            if (strlen($data) >= $posChecksum + strlen($searchHeader) + 1) {
                $crc = 0;
                for ($i = 0; $i < $posChecksum + strlen($searchHeader) + 1; $i++) {
                    $crc += ord($data[$i]);
                    $crc %= 256;
                }

                // We are good!
                if ($crc == 0) {
                    $this->SendDebug('CHECKSUM', 'OK', 0);

                    // Trim will remove the first CRLF on the left if available
                    // Do not trim right. We want the checksum character to be in place - and it might be a trim character
                    $this->ParsePacket(ltrim(substr($data, 0, $posChecksum + strlen($searchHeader) + 1)));
                } else {
                    $this->SendDebug('CHECKSUM', 'ERROR', 0);
                }
            }

            // Cut data regardless if it was good or not
            $data = substr($data, $posChecksum + strlen($searchHeader) + 1);

            // Quit if we have no data to check
            if (!$data) {
                break;
            }

            // Maybe we received multiple packets at once. Check again
            $posChecksum = strpos($data, $searchHeader);
        }

        // Put remaining data into buffer
        $this->SetBuffer('Data', $data);
    }

    private function ParsePacket($packet)
    {
        $lines = explode("\r\n", $packet);
        foreach ($lines as $line) {
            // We need to limit the explode - The Checksum value might be a TAB character
            // which we do not want to be recognized as a split character
            $parts = explode("\t", $line, 2);

            // Sanitize label
            $label = preg_replace('/[^a-zA-Z0-9_]/', '', $parts[0]);

            // Skip empty value
            if(!array_key_exists(1, $parts)){
                continue;      
            }

            // Sanitize value
            $value = $parts[1];
            if ($value == '---') {
                $value = 0;
            } elseif (substr($value, 0, 2) == '0x') {
                $value = substr($value, 2);
            } elseif (strtolower($value) == 'on') {
                $value = true;
            } elseif (strtolower($value) == 'off') {
                $value = false;
            }

            $this->ProcessFields($label, $value);
        }
    }

    private function ProcessFields($label, $value)
    {
        // Skip Checksum field
        if ($label == 'Checksum') {
            return;
        }

        $this->SendDebug('FIELD', $label . ' ' . $value, 0);

        // Take care of special case. Add new variable to the product name
        if ($label == 'PID') {
            $this->MaintainVariable('PNAME', $this->Translate('Product Name'), VARIABLETYPE_STRING, '', -1, true);
            if (isset($this->products[$value])) {
                $this->SetValueEx('PNAME', $this->products[$value], 0);
            } else {
                $this->SetValueEx('PNAME', $this->Translate('Unknown'), 0);
            }
        }

        // Check if we know the label. This will allow richer variable creation
        if (isset($this->fields[$label])) {
            $field = $this->fields[$label];
            $profile = isset($field['Profile']) ? $field['Profile'] : '';
            $divider = isset($field['Divider']) ? $field['Divider'] : 1;
            $drift = isset($field['Drift']) ? $field['Drift'] : 0;
            $position = array_search($label, array_keys($this->fields)) * 100;

            // Some fields need to be split into a bitmask and therefore multiple variables
            if (isset($field['Bitmask'])) {
                foreach ($field['Bitmask'] as $key => $mask) {
                    if (in_array($this->ReadPropertyInteger('DeviceType'), $mask['Supported'])) {
                        $this->MaintainVariable($label . '_' . $key, $this->Translate($field['Name']) . ' (' . $this->Translate($mask['Name']) . ')', $field['Type'], $profile, $position, true);
                        $this->SetValueEx($label . '_' . $key, ($value & $key) > 0, 0);
                    }
                    $position++;
                }
            } else {
                $this->MaintainVariable($label, $this->Translate($field['Name']), $field['Type'], $profile, $position, true);

                // We need to apply the diver for numerical values
                if (is_numeric($value)) {
                    $value /= $divider;
                }

                $this->SetValueEx($label, $value, $drift);
            }
        }
        // Fallback to a more generic solution
        else {
            if (is_numeric($value)) {
                $this->RegisterVariableFloat($label, $label);
            } else {
                $this->RegisterVariableString($label, $label);
            }
            $this->SetValueEx($label, $value, 0);
        }
    }

    private function SetValueEx($ident, $value, $drift)
    {
        $diff = $this->GetValue($ident) != $value;

        // We want to invalidate diffs if the required drift is not reached
        if ($drift) {
            if (abs($this->GetValue($ident) - $value) < $drift) {
                $diff = false;
            }
        }

        $id = $this->GetIDForIdent($ident);
        if ($diff || (time() - IPS_GetVariable($id)['VariableUpdated'] > 60)) {
            $this->SetValue($ident, $value);
        }
    }
}