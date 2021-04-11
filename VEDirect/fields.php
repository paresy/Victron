<?php

declare(strict_types=1);

const DEVICE_TYPE_BMV = 0;
const DEVICE_TYPE_MPPT = 1;
const DEVICE_TYPE_INVERTER = 2;
const DEVICE_TYPE_CHARGER = 3;

trait VEDirectFields
{
    private $fields = [
        'V'        => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Main battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'V2'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Channel 2 battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'V3'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Channel 3 battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'VS'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Auxiliary starter voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'VM'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Mid-point voltage of the battery bank',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'DM'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Mid-point deviation of the battery bank',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Intensity.100',
            'Divider' => 100
        ],
        'VPV'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Panel voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'PPV'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Panel power',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Watt.3680'
        ],
        'I'        => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Main battery current',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'I2'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Channel 2 battery current',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'I3'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Channel 3 battery current',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'IL'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Load current',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'LOAD'     => [
            'Type'    => VARIABLETYPE_BOOLEAN,
            'Name'    => 'Load output state',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Switch'
        ],
        'T'        => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Battery temperature',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Temperature'
        ],
        'P'        => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Instantaneous power',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Watt.3680'
        ],
        'CE'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Consumed Amp Hours',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'SOC'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'State-of-charge',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Intensity.100',
            'Divider' => 100,
            'Drift'   => 1
        ],
        'TTG'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Time-to-go',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.TimeToGo',
            'Drift'   => 5
        ],
        'Alarm'    => [
            'Type'    => VARIABLETYPE_BOOLEAN,
            'Name'    => 'Alarm condition active',
            'Icon'    => 'Alert',
            'Profile' => '~Alert'
        ],
        'Relay'    => [
            'Type'    => VARIABLETYPE_BOOLEAN,
            'Name'    => 'Relay state',
            'Icon'    => 'Power',
            'Profile' => '~Switch'
        ],
        'AR'       => [
            'Type'    => VARIABLETYPE_BOOLEAN,
            'Name'    => 'Alarm',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Alert',
            'Bitmask' => [
                1 => [
                    'Name'      => 'Low Voltage',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                2 => [
                    'Name'      => 'High Voltage',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                4 => [
                    'Name'      => 'Low SOC',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                8 => [
                    'Name'      => 'Low Starter Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                16 => [
                    'Name'      => 'High Starter Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                32 => [
                    'Name'      => 'Low Temperature',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                64 => [
                    'Name'      => 'High Temperature',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                128 => [
                    'Name'      => 'Mid Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                256 => [
                    'Name'      => 'Overload',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                512 => [
                    'Name'      => 'DC-ripple',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                1024 => [
                    'Name'      => 'Low V AC out',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                2048 => [
                    'Name'      => 'High V AC out',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                4096 => [
                    'Name'      => 'Short Circuit',
                    'Supported' => []
                ],
                8192 => [
                    'Name'      => 'BMS Lockout',
                    'Supported' => []
                ]
            ]
        ],
        'OR'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Off reason',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.OffReason'
        ],
        'H1'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Depth of the deepest discharge',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H2'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Depth of the last discharge',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H3'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Depth of the average discharge',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H4'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of charge cycles',
            'Icon'    => 'EnergySolar'
        ],
        'H5'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of full discharges',
            'Icon'    => 'EnergySolar'
        ],
        'H6'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Cumulative Amp Hours drawn',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H7'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Minimum main battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H8'       => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Maximum main battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H9'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of seconds since last full charge',
            'Icon'    => 'EnergySolar',
            'Drift'   => 10
        ],
        'H10'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of automatic synchronizations',
            'Icon'    => 'EnergySolar'
        ],
        'H11'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of low main voltage alarms',
            'Icon'    => 'EnergySolar'
        ],
        'H12'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of high main voltage alarms',
            'Icon'    => 'EnergySolar'
        ],
        'H13'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of low auxiliary voltage alarms',
            'Icon'    => 'EnergySolar'
        ],
        'H14'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Number of high auxiliary voltage alarms',
            'Icon'    => 'EnergySolar'
        ],
        'H15'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Minimum auxiliary battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H16'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Maximum auxiliary battery voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt',
            'Divider' => 1000,
            'Drift'   => 0.2
        ],
        'H17'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Amount of discharged energy',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Electricity'
        ],
        'H18'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Amount of charged energy',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Electricity'
        ],
        'H19'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Yield total',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Electricity',
            'Divider' => 100
        ],
        'H20'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Yield today',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Electricity',
            'Divider' => 100
        ],
        'H21'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Maximum power today',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Watt.3680'
        ],
        'H22'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Yield yesterday',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Electricity',
            'Divider' => 100
        ],
        'H23'      => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'Maximum power yesterday',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Watt.3680'
        ],
        'ERR'      => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Error code',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.ErrorCode'
        ],
        'CS'       => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'State of operation',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.StateOfOperation'
        ],
        'BMV'      => [
            'Type'    => VARIABLETYPE_STRING,
            'Name'    => 'Model description (deprecated)',
            'Icon'    => 'EnergySolar'
        ],
        'FW'       => [
            'Type'    => VARIABLETYPE_STRING,
            'Name'    => 'Firmware version',
            'Icon'    => 'EnergySolar'
        ],
        'FWE'      => [
            'Type'    => VARIABLETYPE_STRING,
            'Name'    => 'Firmware version',
            'Icon'    => 'EnergySolar'
        ],
        'PID'      => [
            'Type'    => VARIABLETYPE_STRING,
            'Name'    => 'Product ID',
            'Icon'    => 'EnergySolar'
        ],
        'SER'      => [
            'Type'    => VARIABLETYPE_STRING,
            'Name'    => 'Serial number',
            'Icon'    => 'EnergySolar'
        ],
        'HSDS'     => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Day sequence number',
            'Icon'    => 'EnergySolar'
        ],
        'MODE'     => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Device mode',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.DeviceMode'
        ],
        'AC_OUT_V' => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'AC output voltage',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Volt'
        ],
        'AC_OUT_I' => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'AC output current',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Ampere'
        ],
        'AC_OUT_S' => [
            'Type'    => VARIABLETYPE_FLOAT,
            'Name'    => 'AC output apparent power',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Power'
        ],
        'WARN'     => [
            'Type'    => VARIABLETYPE_BOOLEAN,
            'Name'    => 'Warning',
            'Icon'    => 'EnergySolar',
            'Profile' => '~Alert',
            'Bitmask' => [
                1 => [
                    'Name'      => 'Low Voltage',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                2 => [
                    'Name'      => 'High Voltage',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                4 => [
                    'Name'      => 'Low SOC',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                8 => [
                    'Name'      => 'Low Starter Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                16 => [
                    'Name'      => 'High Starter Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                32 => [
                    'Name'      => 'Low Temperature',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                64 => [
                    'Name'      => 'High Temperature',
                    'Supported' => [DEVICE_TYPE_BMV, DEVICE_TYPE_INVERTER]
                ],
                128 => [
                    'Name'      => 'Mid Voltage',
                    'Supported' => [DEVICE_TYPE_BMV]
                ],
                256 => [
                    'Name'      => 'Overload',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                512 => [
                    'Name'      => 'DC-ripple',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                1024 => [
                    'Name'      => 'Low V AC out',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                2048 => [
                    'Name'      => 'High V AC out',
                    'Supported' => [DEVICE_TYPE_INVERTER]
                ],
                4096 => [
                    'Name'      => 'Short Circuit',
                    'Supported' => []
                ],
                8192 => [
                    'Name'      => 'BMS Lockout',
                    'Supported' => []
                ]
            ]
        ],
        'MPPT'     => [
            'Type'    => VARIABLETYPE_INTEGER,
            'Name'    => 'Tracker operation mode',
            'Icon'    => 'EnergySolar',
            'Profile' => 'VEDirect.TrackerOperationMode'
        ]
    ];
}