<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceItemController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has("action")){
            $resp = [
                "error"=>false
            ];
            switch ($request->get("action")){
                case "find":
                    $validator = Validator::make($request->all(),[
                        "ids" => ["required", "exists:invoice_items,ids"]
                    ]);
                    if ($validator->fails()){
                        $resp = [
                            "error"=>true
                        ];
                    }else{
                        $found = InvoiceItem::query()
                            ->with("invoice")
                            ->where("ids", $request->get("ids"))
                            ->first()
                            ->toArray();
                        $resp = [
                            "error" => false,
                            "data" => $found,
                        ];
                    }
            }
            return response($resp);
        }else{
            return exit(404);
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
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItem $invoiceItem)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceItem $invoiceItem)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:255"]
        ]);
        if ($validator->fails()){
            $rps =[
                "error" => true,
                "errors" => $validator->errors()
            ];
        }else{
            $rps = [
                "error" => false,
                "data" => $validator->validate()
            ];
            $invoiceItem->update($rps["data"]);
            $invoiceItem->save();
        }
        return response($rps);
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItem $invoiceItem)
    {
        //
    }
}
