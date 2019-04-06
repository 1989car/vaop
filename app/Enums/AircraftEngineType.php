<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AircraftEngineType extends Enum
{
    const Electric = 'electric';
    const Jet = 'jet';
    const Piston = 'piston';
    const Rocket = 'rocket';
    const Turboprop = 'turboprop';
}
