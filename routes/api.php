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
    Route::put("customer/photo/{customer}",[Controllers\CustomerController::class, "update_photo"])->name("customer.save");
    Route::put("staff/photo/{staff}",[Controllers\StaffController::class, "update_photo"])->name("staff.save");
    Route::apiResource("invoice",Controllers\InvoiceController::class);
    Route::apiResource("payment",Controllers\InvoicePaymentController::class);
    Route::apiResource("invoice_item",Controllers\InvoiceItemController::class);
    Route::apiResource("stock",Controllers\StockController::class);
    Route::apiResource("sale",Controllers\SaleController::class);
    Route::apiResource("salary",Controllers\SalaryPaymentController::class);
    Route::apiResource("staff",Controllers\StaffController::class);
    Route::get("report/staff", [Controllers\StaffController::class, "report"])->name("report.staff");
    Route::get("report/expense", [Controllers\ReportController::class, "expense"])->name("expense.report");
    Route::get("report/income", [Controllers\ReportController::class, "income"])->name("expense.income");
    Route::get("report/net", [Controllers\ReportController::class, "net"])->name("expense.net");
    Route::apiResource("scan",Controllers\ScanController::class);
    Route::get("buy/report", [Controllers\SupplierController::class, "report"])->name("supplier.reports");
    Route::get("buy/stock", [Controllers\SupplierController::class, "stock"])->name("supplier.stocks");
    Route::delete("del/scan", [Controllers\Front\StaffController::class, "delete_scan"])->name("del.scan");
});
