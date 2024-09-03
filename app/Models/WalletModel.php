<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    use HasFactory;

    protected $table = 'wallets';

    protected $fillable = [
        'id',
        'balance',
        'customer_id'
    ];

    protected $casts = [
        'balance'=> 'integer'
    ];
}
