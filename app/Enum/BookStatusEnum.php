<?php

namespace App\Enum;

enum BookStatusEnum: string
{
    case RESERVED = 'reserved';
    case ACTIVE = 'active';
    case FINISHED = 'finished';
}
