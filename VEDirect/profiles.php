<?php

declare(strict_types=1);

trait VEDirectProfiles
{
    private function RegisterProfiles()
    {
        if (!IPS_VariableProfileExists('VEDirect.Intensity.100')) {
            IPS_CreateVariableProfile('VEDirect.Intensity.100', VARIABLETYPE_FLOAT);
            IPS_SetVariableProfileValues('VEDirect.Intensity.100', 0, 100, 1);
            IPS_SetVariableProfileDigits('VEDirect.Intensity.100', 1);
            IPS_SetVariableProfileText('VEDirect.Intensity.100', '', ' %');
        }

        if (!IPS_VariableProfileExists('VEDirect.TimeToGo')) {
            IPS_CreateVariableProfile('VEDirect.TimeToGo', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileText('VEDirect.TimeToGo', '', ' ' . $this->Translate('Minutes'));
        }

        if (!IPS_VariableProfileExists('VEDirect.RelayState')) {
            IPS_CreateVariableProfile('VEDirect.RelayState', VARIABLETYPE_BOOLEAN);
            IPS_SetVariableProfileAssociation('VEDirect.RelayState', 0, $this->Translate('Normal operation'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.RelayState', 1, $this->Translate('Alarm'), '', -1);
        }

        if (!IPS_VariableProfileExists('VEDirect.OffReason')) {
            IPS_CreateVariableProfile('VEDirect.OffReason', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 0, $this->Translate('-'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 1, $this->Translate('No Input Power'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 2, $this->Translate('Switched off (power switch)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 4, $this->Translate('Switched off (device mode register)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 8, $this->Translate('Remote input'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 10, $this->Translate('Protection active'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 20, $this->Translate('Paygo'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 40, $this->Translate('BMS'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 80, $this->Translate('Engine shutdown detection'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.OffReason', 100, $this->Translate('Analysing input voltage'), '', -1);
        }

        if (!IPS_VariableProfileExists('VEDirect.StateOfOperation')) {
            IPS_CreateVariableProfile('VEDirect.StateOfOperation', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 0, $this->Translate('Off'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 1, $this->Translate('Low power'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 2, $this->Translate('Fault'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 3, $this->Translate('Bulk'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 4, $this->Translate('Absorption'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 5, $this->Translate('Float'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 6, $this->Translate('Storage'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 7, $this->Translate('Equalize (manual)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 9, $this->Translate('Inverting'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 11, $this->Translate('Power supply'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 245, $this->Translate('Starting-up'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 246, $this->Translate('Repeated absorption'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 247, $this->Translate('Auto equalize / Recondition'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 248, $this->Translate('BatterySafe'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.StateOfOperation', 252, $this->Translate('External Control'), '', -1);
        }

        if (!IPS_VariableProfileExists('VEDirect.ErrorCode')) {
            IPS_CreateVariableProfile('VEDirect.ErrorCode', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 0, $this->Translate('No error'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 2, $this->Translate('Battery voltage too high'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 17, $this->Translate('Charger temperature too high'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 18, $this->Translate('Charger over current'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 19, $this->Translate('Charger current reversed'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 20, $this->Translate('Bulk time limit exceeded'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 21, $this->Translate('Current sensor issue (sensor bias/sensor broken)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 26, $this->Translate('Terminals overheated'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 28, $this->Translate('Converter issue (dual converter models only)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 33, $this->Translate('Input voltage too high (solar panel)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 34, $this->Translate('Input current too high (solar panel)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 38, $this->Translate('Input shutdown (due to excessive battery voltage)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 39, $this->Translate('Input shutdown (due to current flow during off mode)'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 65, $this->Translate('Lost communication with one of devices'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 66, $this->Translate('Synchronised charging device configuration issue'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 67, $this->Translate('BMS connection lost'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 68, $this->Translate('Network misconfigured'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 116, $this->Translate('Factory calibration data lost'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 117, $this->Translate('Invalid/incompatible firmware'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.ErrorCode', 119, $this->Translate('User settings invalid'), '', -1);
        }

        if (!IPS_VariableProfileExists('VEDirect.DeviceMode')) {
            IPS_CreateVariableProfile('VEDirect.DeviceMode', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileAssociation('VEDirect.DeviceMode', 1, $this->Translate('Charger'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.DeviceMode', 2, $this->Translate('Inverter'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.DeviceMode', 4, $this->Translate('OFF'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.DeviceMode', 8, $this->Translate('ECO'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.DeviceMode', 16, $this->Translate('Hibernate'), '', -1);
        }

        if (!IPS_VariableProfileExists('VEDirect.TrackerOperationMode')) {
            IPS_CreateVariableProfile('VEDirect.TrackerOperationMode', VARIABLETYPE_INTEGER);
            IPS_SetVariableProfileAssociation('VEDirect.TrackerOperationMode', 0, $this->Translate('Off'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.TrackerOperationMode', 1, $this->Translate('Voltage or current limited'), '', -1);
            IPS_SetVariableProfileAssociation('VEDirect.TrackerOperationMode', 2, $this->Translate('MPP Tracker active'), '', -1);
        }
    }
}