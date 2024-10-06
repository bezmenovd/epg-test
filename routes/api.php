<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'orders.', 'prefix' => '/orders'], function() {
    Route::get('/{order}', [Controllers\OrderController::class, 'get'])->name('get');
});
