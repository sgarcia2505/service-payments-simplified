<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\WalletModel;
use App\Models\CustomerModel;
use App\Enums\CustomerTypeEnum;
use App\Enums\DocumentTypeEnum;
use App\Enums\TransactionStatusEnum;

class TransactionControllerTest extends TestCase
{
    public function testSendPayment(): void
    {
        $customerPayer = CustomerModel::factory()->create([
            'document_type' => DocumentTypeEnum::CPF->value,
            'document' => fake()->unique()->numerify('###########'),
            'customer_type' => CustomerTypeEnum::COMMON->value
        ]);

        $walletPayer = WalletModel::factory()->create([
            'balance' => 15000,
            'customer_id' => $customerPayer->getKey()
        ]);

        $customerReceiver = CustomerModel::factory()->create([
            'document_type' => DocumentTypeEnum::CNPJ->value,
            'document' => fake()->unique()->numerify('##############'),
            'customer_type' => CustomerTypeEnum::MERCHANT->value
        ]);

        $walletReceiver = WalletModel::factory()->create([
            'balance' => 10000,
            'customer_id' => $customerPayer->getKey()
        ]);
       $amount = 1000;

        $response = $this->postJson('/transfers',[
            'customer_id_payer' => $customerPayer->getKey(),
            'customer_id_receiver' => $customerReceiver->getKey(),
            'amount' => $amount,
            'status' => TransactionStatusEnum::CREATED
        ]);

        $response->assertNoContent();

        $this->assertDatabaseHas('transactions',[
            'customer_id_payer' => $customerPayer->getKey(),
            'customer_id_receiver' => $customerReceiver->getKey(),
            'amount' => $amount,
            'status' => TransactionStatusEnum::CREATED
        ]);

        $this->assertDatabaseHas('wallets',[
            'customer_id' => $customerPayer->getKey(),
            'balance' => 14000
        ]);

        $this->assertDatabaseHas('wallets',[
            'customer_id' => $customerReceiver->getKey(),
            'balance' => 11000
        ]);
    }
}