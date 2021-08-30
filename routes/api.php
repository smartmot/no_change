<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware("auth.basic")->group(function (){
    Route::apiResource("supplier",Controllers\SupplierController::class);
    Route::put("supplier/profile/{supplier}",[Controllers\SupplierController::class,"update_profile"])->name("supplier.save");
    Route::apiResource("customer",Controllers\CustomerController::class);
    Route::apiResource("invoice",Controllers\InvoiceController::class);
    Route::apiResource("payment",Controllers\InvoicePaymentController::class);
    Route::apiResource("invoice_item",Controllers\InvoiceItemController::class);
    Route::apiResource("stock",Controllers\StockController::class);
    Route::apiResource("sale",Controllers\SaleController::class);
    Route::get("buy/report", [Controllers\SupplierController::class, "report"])->name("supplier.reports");
    Route::get("buy/stock", [Controllers\SupplierController::class, "stock"])->name("supplier.stocks");
});
