<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public const WALLET_ID = 'wallet_id';
    public const AMOUNT = 'amount';

    protected $fillable = [
        self::WALLET_ID,
        self::AMOUNT,
    ];
}
