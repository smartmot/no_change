<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SalePayment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $sale = [
                "customer_id" => ($data["customer_id"] ?? null),
                "date" => date("Y-m-d"),
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
                "paid" => $data["paid"],
                "date" => date("Y-m-d"),
                "due" => $data["total"] - $data["paid"],
            ];
            $paid = new SalePayment($payment);
            $paid->save();

            $resp = [
                "error" => $error,
            ];
            return response($data);
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
