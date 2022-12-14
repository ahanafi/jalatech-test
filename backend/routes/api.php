<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SaleOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth Routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user', function (Request $request){
        return $request->user();
    });

    Route::resource('products', ProductController::class)->except(['create', 'edit']);
    Route::post('purchase-order', [PurchaseOrderController::class, 'store'])->name('purchase-order.store');
    Route::post('sale-order', [SaleOrderController::class, 'store'])->name('sale-order.store');
    Route::post('sale-order/{order}/approve', [SaleOrderController::class, 'approve'])->name('sale-order.approve');

});

