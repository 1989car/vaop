<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ReservationStatus extends Enum
{
    const Requested = 'requested';
    const Scheduled = 'scheduled';
    const Delayed = 'delayed';
    const Dispatching = 'dispatching';
    const Dispatched = 'dispatched';
    const Cancelled = 'cancelled';
    const AttentionRequired = 'attention';
}
