<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Requests\CreateTransactionRequest;

class TransactionController extends Controller
{
    public function __construct(
        //private TransactionRepository $transactionRepository,
        //private WalletRepository $walletRepository
        ){
    
    }
    public function sendPayment(CreateTransactionRequest $request): Response 
    {
        //validar se customer_id_payer é de um cliente comum
        //validar se o customer_id_payer tem saldo para ser enviado
        //autorizador no servidor externo 
        return response()->json(['status' => 'success']);
    }
}
