<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qty = "SELECT SUM(qty) FROM stocks WHERE item_id = invoice_items.id";
        $qtys = "SELECT SUM(qty) FROM stocks WHERE item_id = invoice_items.id AND type = 'stock_in'";
        $sold = "SELECT SUM(qty) FROM stocks WHERE item_id = invoice_items.id AND type = 'sold'";
        $date = "SELECT date FROM invoices WHERE id = invoice_items.invoice_id";
        $currency = "SELECT currency FROM invoices WHERE id = invoice_items.invoice_id";
        $lost = "SELECT SUM(qty) FROM stocks WHERE item_id = invoice_items.id AND type = 'lost'";
        $stock = DB::table("invoice_items")
            ->selectRaw("*,($qty) as qty,($qtys) as qtys,-($sold) as sold, ($date) as date, ($currency) as currency, ($lost) as lost")
            ->limit(50);
        if ($request->has("keyword") && $request->has("mode")){
            $mode=["ids","name"];
            if (!in_array($request->get("mode"), $mode)){
                exit(json_encode([]));
            }
            $stock
                ->where($request->get("mode"), "LIKE", "%".$request->get("keyword")."%");
        }

        if ($request->has("date") && $request->has("from") && $request->has("to")){
            switch ($request->get("date")){
                case "true":
                    $stock
                        ->having("date", ">=", $request->get("from"))
                        ->having("date", "<=", $request->get("to"));
                    break;
            }
        }

        if ($request->has("num") && $request->has("value")){
            switch ($request->get("num")){
                case "true":
                    if ($request->get("value")!=""){
                        $stock
                            ->having("qty", ">=", $request->get("value"));
                    }
                    break;
                case "false":
                    break;
            }
        }


        return response($stock->get()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
