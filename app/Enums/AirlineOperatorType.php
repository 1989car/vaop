<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AirlineOperatorType extends Enum
{
    const Scheduled = 'S';
    const NonScheduled = 'N';
    const GeneralAviation = 'G';
    const DVFR = 'D';
    const Military = 'M';
    const Other = 'X';
}
