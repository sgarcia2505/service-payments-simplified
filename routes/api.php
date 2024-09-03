<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/alive', function () {
    return 'ok';
});

Route::controller(TransactionController::class)->group(function () {
    Route::post('/transfer', 'sendPayment');
});