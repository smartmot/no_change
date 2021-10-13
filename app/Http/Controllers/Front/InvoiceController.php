<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Inv/Show1";

    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supplier $supplier)
    {
        $inv = Invoice::query()
            ->where("supplier_id", "=", $supplier->id)
            ->count("id");
        return view("frontend.invoices_create")->with([
            "supplier" => $supplier,
            "inv_num" => $supplier->ids . ($inv+1)
        ]);
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

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier, Invoice $invoice)
    {
        return view("frontend.invoices_show")->with([
            "supplier" => $supplier,
            "stocks" => InvoiceItem::query()
            ->where("invoice_id", $invoice->id)
            ->get()
            ->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Hi";
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

    public function check(Supplier $supplier, Invoice $invoice){
        return view("frontend.invoices_check")->with([
            "supplier" => $supplier,
            "invoice" => $invoice,
        ]);
    }
}
