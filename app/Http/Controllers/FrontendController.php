<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class FrontendController extends Controller
{

    public function home(){
        return view("frontend.home")->with([
            "name" => "POS SYSTEM"
        ]);
    }

    public function test(){
        $sale = Sale::query()
            ->with("items")
            ->limit(3)
            ->get()
            ->where("customer_id", "=", 1)
            ->toArray();
        dd($sale);
    }

    public function buy(){
        return view("frontend.buy");
    }

    public function create_supplier(){
        return view("frontend.create_supplier");
    }

    public function show_supplier(Supplier $supplier){

    }

    public function sell(){
        return view("frontend.sell");
    }

    public function sell_customer(){
        return view("frontend.sell_customer");
    }
    public function customer_show(Customer $customer){
        return view("frontend.customer_show")->with([
            "customer" => $customer
        ]);
    }
    public function add_customer(){
        return view("frontend.sell_addcustomer");
    }

    public function stock(){
        return view("frontend.stock");
    }

    public function stockcount(){
        return view("frontend.stock_count");
    }

    public function staffadd(){
        return view("frontend.staff_add");
    }

    public function customer(){
        return view("frontend.customer");
    }

    public function staff(){
        return view("frontend.staff");
    }

    public function report(){
        return view("frontend.report");
    }


    public function auth(){
        $data = [
            "headers" => [
                "Authorization" =>"Basic ".base64_encode(Auth::user()->email.":".Auth::user()->token)
            ]
        ];
        return response()->json($data);
    }

    public function script(){
        return Response::view("script")->header('Content-Type', " text/javascript");
    }

}
