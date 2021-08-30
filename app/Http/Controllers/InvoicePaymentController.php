<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoicePaymentController extends Controller
{
    /*
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
            "invoice_id" => ["required", "exists:invoices,id"],
            "paid" => ["required", "numeric"],
            "pay_date" => ["required", "date"]
        ]);
        if ($validator->fails()){
            $resp = [
                "error" => true,
                "errors" => $validator->errors()
            ];
        }else{
            $data = $validator->validate();
            $invoice = Invoice::query()->where("id", $data["invoice_id"])->first();
            if ($data["paid"] > $invoice->due){
                $resp = [
                    "error" => true,
                    "errors" => [
                        "paid"=>[
                            0=>"បញ្ចូលលុយលើសចំនួន!"
                        ]
                    ]
                ];
            }else{
                $payment = new InvoicePayment($data);
                $payment->save();
                $resp = [
                    "error" => false,
                    "invoice" => $invoice->toArray()
                ];
            }
        }
        return response($resp);
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicePayment $invoicePayment)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoicePayment $invoicePayment)
    {
        return response("Hi! Pay me");
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoicePayment  $invoicePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicePayment $invoicePayment)
    {
        //
    }
}
