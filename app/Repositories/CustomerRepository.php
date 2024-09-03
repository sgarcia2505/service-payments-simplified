<?php

namespace App\Repositories;

use App\Models\CustomerModel;

class CustomerRepository 
{
    public function getCustomer($customer_id) 
    {
        return CustomerModel::where('id', $customer_id)->first();
    }
}