<?php

namespace App\Repositories;

use App\Models\TransactionModel;

class TransactionRepository 
{
    public function create(array $payload) 
    {
        return TransactionModel::create([
            'customer_id_payer' => $payload['customer_id_payer'],
            'customer_id_receiver' => $payload['customer_id_receiver'],
            'amount' => $payload['amount'],
            'status' => $payload['status']
        ]);
    }
}