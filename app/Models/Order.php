<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const TYPE = 'type';
    public const STATUS = 'status';
    public const DEPOSIT = 'deposit';
    public const PROFIT = 'profit';

    public const CRYPTO_TYPE = 1;
    public const STOCK_TYPE = 2;
    public const CURRENCY_TYPE = 3;

    public const OPENED_STATUS = 1;
    public const COMPLETED_STATUS = 2;
    public const CANCELLED_STATUS = 3;

    protected $fillable = [
        self::TYPE,
        self::STATUS,
        self::DEPOSIT,
        self::PROFIT,
    ];
}
