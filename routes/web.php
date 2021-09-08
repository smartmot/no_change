<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(["auth"])->group(function (){
    Route::get('/',[Controllers\FrontendController::class,"home"])->name("home");

    Route::get("/buy",[Controllers\FrontendController::class,"buy"])->name("buy");
    Route::get("/buy/create",[Controllers\FrontendController::class,"create_supplier"])->name("supplier.create");

    Route::resource("/buy/suppliers", Controllers\Front\SupplierController::class);
    Route::get("/buy/report/{supplier}", [Controllers\Front\SupplierController::class, "report"])->name("supplier.report");
    Route::get("/buy/stock/{supplier}", [Controllers\Front\SupplierController::class, "stock"])->name("supplier.stock");
    Route::get("/buy/supplier/{supplier}/{invoice}", [Controllers\Front\InvoiceController::class, "check"])->name("invoices.check");
    Route::resource("/buy/suppliers/{supplier}/invoices", Controllers\Front\InvoiceController::class);

    Route::get("/sell",[Controllers\FrontendController::class,"sell"])->name("sell");
    Route::get("/sell/customer",[Controllers\FrontendController::class,"sell_customer"])->name("sell.customer");
    Route::get("/sell/customer/c/{customer}",[Controllers\FrontendController::class,"customer_show"])->name("customer.show");
    Route::get("/sell/customer/stock/{customer}",[Controllers\FrontendController::class,"customer_stock"])->name("customer.stock");
    Route::get("/sell/customer/add",[Controllers\FrontendController::class,"add_customer"])->name("sell.addcustomer");
    Route::get("/stock",[Controllers\FrontendController::class,"stock"])->name("stock");
    Route::get("/stock/count",[Controllers\FrontendController::class,"stockcount"])->name("stock.count");
    Route::get("/customer",[Controllers\FrontendController::class,"customer"])->name("customer");
    Route::get("/staffs",[Controllers\FrontendController::class,"staff"])->name("staff");
    Route::get("/staffs/scan",[Controllers\FrontendController::class,"staff_scan"])->name("staff.scan");
    Route::get("/staffs/list",[Controllers\FrontendController::class,"staff"])->name("staff.list");
    Route::get("/staffs/report",[Controllers\FrontendController::class,"staff_report"])->name("staff.report");
    Route::get("/staff/{staff}",[Controllers\FrontendController::class,"staff_show"])->name("staff.show");
    Route::get("/staff/{staff}/history",[Controllers\FrontendController::class,"staff_show"])->name("staff.history");
    Route::get("/staff/{staff}/docs",[Controllers\FrontendController::class,"staff_show"])->name("staff.docs");
    Route::get("/staffs/add",[Controllers\FrontendController::class,"staffadd"])->name("staff.add");
    Route::get("/report",[Controllers\FrontendController::class,"report"])->name("report");

    Route::post("/upload",[Controllers\UploadController::class,"upload"])->name("upload.image");
    Route::post("/upload/inv",[Controllers\UploadController::class,"invoice"])->name("upload.invoice");
    Route::post("/upload/itm",[Controllers\UploadController::class,"items"])->name("upload.items");
    Route::post("/upload/itm/crop",[Controllers\UploadController::class,"crop_item"])->name("item.crop");
    Route::post("/upload/itm/check",[Controllers\UploadController::class,"check_item"])->name("item.check");
    Route::get("/photo/inv.jpg",[Controllers\UploadController::class,"show_invoice"])->name("upload.show");

    Route::post("/upload/crop",[Controllers\UploadController::class,"crop"])->name("upload.crop");

    Route::post("/auth",[Controllers\FrontendController::class, "auth"])->name("auth");
});

Route::get("/test",[Controllers\FrontendController::class,"test"]);
Route::get("/tx",function (){
    return view("frontend.test");
});
Route::get("/barcode/{code}",[Controllers\FileController::class,"barcode"]);


Route::get('/script.js', [Controllers\FrontendController::class,"script"])->name("script");
Route::get('/photo/6x7.jpg', [Controllers\FileController::class,"svg6x7"])->name("svg6x7");
Route::get('/photo/profile.jpg', [Controllers\FileController::class,"svgprofile"])->name("svgprofile");

Route::get('/a4', [Controllers\FileController::class,"a4jpg"])->name("a4");
Route::get('/login', [Controllers\LoginController::class,"login"])->name("login");
Route::post('/login', [Controllers\LoginController::class,"submit"])->name("login.submit");
Route::post('/logout', [Controllers\LoginController::class,"logout"])->name("logout");
