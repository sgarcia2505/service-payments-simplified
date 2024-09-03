<?php

namespace App\Models;

use App\Models\WalletModel;
use App\Enums\DocumentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerModel extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'document',
        'document_type',
        'email',
        'phone',
        'password',
        'customer_type'
    ];

    protected $casts = [
        'document_type'=> DocumentTypeEnum::class
    ];

    public function wallet()
    {
        return $this->morphOne(WalletModel::class, 'customer');
    }
}
