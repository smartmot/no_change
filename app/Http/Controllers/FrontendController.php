<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\Sale;
use App\Models\Scan;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class FrontendController extends Controller
{

    public function home(){
        return view("frontend.home")->with([
            "name" => "POS SYSTEM"
        ]);
    }

    public function test(){
        $month = 6;
        $year = 2021;
        $scan = DB::table("scans")
            ->selectRaw("*, DATE(time) as date, MONTH(time) as month, YEAR(time) as year")
            ->where("staff_id", "=", 1)
            //->having("month", "=", $month)
            ->having("year", "=", $year)
            ->get()
            ->groupBy("date")
            ->toArray();
        dd($scan);
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
    public function customer_stock(Customer $customer){
        function moneyz($curr, $sum, $c_id){
            return Sale::query()
                ->where("customer_id", "=", $c_id)
                ->where("currency", "=", $curr)->get()->sum($sum);
        }
        $total = moneyz("usd", "total", $customer->id) +
            moneyz("riel", "total", $customer->id)/(config("pos.exchange")["riel_usd"]) +
            moneyz("bath", "total", $customer->id)/(config("pos.exchange")["bath_usd"]);
        $paid = moneyz("usd", "paid", $customer->id) +
            moneyz("riel", "paid", $customer->id)/(config("pos.exchange")["riel_usd"]) +
            moneyz("bath", "paid", $customer->id)/(config("pos.exchange")["bath_usd"]);

        return view("frontend.customer_stock")->with([
            "customer" => $customer,
            "total" => $total,
            "paid" => $paid,
        ]);
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

    public function staff_show(Staff $staff){
        return view("frontend.staff_show")->with([
            "staff" => $staff
        ]);
    }
    public function staff_scan(){
        return view("frontend.staff_scan");
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
