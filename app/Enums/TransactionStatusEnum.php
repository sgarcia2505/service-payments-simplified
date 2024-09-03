<?php

namespace App\Enums;

enum TransactionStatusEnum: string
{
    case CREATED = 'created';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}
