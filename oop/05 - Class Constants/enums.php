<?php

class Status
{
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';

    public const ALL_STATS = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined',
    ];
}

// No scaler value
// $status->name;
// $status->value;
enum StatusEnum
{
    case PAID;
    case PENDING;
    case DECLINED;

    public function toString(): string
    {
        return match ($this) {
            self::PAID => 'Paid',
            self::PENDING => 'Pending',
            self::DECLINED => 'Declined'
        };
    }
}

enum StatusIntEnum: int
{
    case PAID = 1;
    case PENDING = 2;
    case DECLINED = 3;
}

enum StatusIntEnum: string
{
    case PAID = 'paid';
    case PENDING = 'pending';
    case DECLINED = 'declined';
}
