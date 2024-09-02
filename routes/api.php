<?php

use Illuminate\Support\Facades\Route;
Route::get('/alive', function () {
    return 'ok';
});