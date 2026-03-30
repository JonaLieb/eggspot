<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    /** *******************************************************************************************************************
     *                                          Cart routes
     *  *******************************************************************************************************************
     */
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
});
