<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AircraftDesignatorType extends Enum
{
    const NotAssigned = 'ZZZZ';
    const Airship = 'SHIP';
    const Balloon = 'BALL';
    const Glider = 'GLID';
    const MicrolightAircraft = 'ULAC';
    const MicrolightAutoGyro = 'GYRO';
    const MicrolightHelicopter = 'UHEL';
    const Sailplane = 'GLID';
    const UltralightAircraft = 'ULAC';
    const UltralightAutoGyro = 'GYRO';
    const UltralightHelicopter = 'UHEL';
}
