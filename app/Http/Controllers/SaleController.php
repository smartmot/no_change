<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Calendar;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SalePayment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "customer_id" => ["required", "exists:customers,id"],
            "filter" => ["required", "in:all,due"]
        ]);

        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $dac = 1;
            $data = $validator->validate();
            $qty = "select SUM(qty) as qty from sale_items inner join stocks on stocks.id = sale_items.stock_id where sale_id = sales.id group by sale_id";
            $paid = "select SUM(paid) from sale_payments where sale_id = sales.id";
            $sale = DB::table("sales")
                ->selectRaw("*,($paid) as paid, total - ($paid) as due, ($qty) as qty")
                ->where("customer_id", "=", $data["customer_id"])
                ->orderBy("created_at", "desc")
                ;

            switch ($data["filter"]){
                case "due":
                    $sale = $sale
                        ->having("due", ">", 0)
                        ->get()
                        ->toArray();
                    break;
                default:
                    $sale = $sale
                        ->get()
                        ->toArray();
            }
            return response([
                "error" => false,
                "data" => $sale
            ]);
        }
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "customer_id" => ["nullable", "exists:customers,id"],
            "currency" => ["required", "in:usd,riel,bath"],
            "note" => ["nullable", "max:255"],
            "items" => ["required","json"],
            "paid" => ["required"],
            "total" => ["required"],
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data =  $validator->validate();
            $items = json_decode($data["items"], true);
            $error = false;
            $ee = ["items"=>[0=>"គ្មានទំនិញ"]];
            $if_error = ["error" => true, "errors" => $ee];
            if (count($items) <= 0){
                exit(json_encode(["error" => true, "errors" => ["items"=>[0=>"គ្មានទំនិញ"]]]));
            }

            if ($data["paid"] > $data["total"]){
                exit(json_encode([
                    "error" => true,
                    "errors" => [
                        "paid" => [0=>"បង់លុយលើស"]
                    ]
                ]));
            }
            $year = date("Y");
            $no = Sale::query()->whereYear("date", $year)->count() + 1;

            $sale = [
                "customer_id" => ($data["customer_id"] ?? null),
                "date" => date("Y-m-d"),
                "user_id" => Auth::id(),
                "no" => $year."-".str_pad($no, 4, '0', STR_PAD_LEFT),
                "currency" => $data["currency"],
                "note" => $data["note"] ?? null,
                "total" => $data["total"],
            ];


            $sell = new Sale($sale);
            $sell->save();
            $sale_id = $sell->id;
            foreach ($items as $item){
                $t_stock = new Stock([
                    "item_id" => $item["item_id"],
                    "qty" => -$item["qty"],
                    "type" => "sold",
                    "note" => null,
                    "date" => date("Y-m-d"),
                ]);
                $t_stock->save();
                $selling = new SaleItem([
                    "sale_id" => $sale_id,
                    "stock_id" => $t_stock->id,
                    "price" => $item["price"],
                ]);
                $selling->save();
            }

            $payment = [
                "sale_id" => $sale_id,
                "user_id" => Auth::id(),
                "paid" => $data["paid"],
                "date" => date("Y-m-d"),
                "due" => $data["total"] - $data["paid"],
            ];
            $paid = new SalePayment($payment);
            $paid->save();

            $resp = [
                "error" => false,
            ];
            $calendar = Calendar::firstOrCreate([
                "date" => date("Y-m-d"),
            ]);
            $log = new  AdminActivity([
                "user_id" => Auth::id(),
                "act"=>"បានលក់ឥវ៉ាន់ជូនអតិថិជន id: ".$data["customer_id"],
                "reference" => $sale_id
            ]);
            $log->save();
            return response($resp);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
