<?php

namespace App\Repositories;

use App\Models\WalletModel;

class WalletRepository 
{
    public function getWallet($customer_id) 
    {
        return WalletModel::where('customer_id', $customer_id)->first();
    }
}