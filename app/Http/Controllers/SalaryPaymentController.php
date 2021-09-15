<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\SalaryPayment;
use App\Models\Staff;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SalaryPaymentController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            "staff_id" => ["required", "exists:staff,id"],
            "for" => ["required"],
            "date" => ["required", "date"],
            "salary" => ["required"],
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $staff = Worker::query()->find($data["staff_id"]);
            if ($staff->is_paid === false){
                exit(json_encode([
                    "error" => true,
                    "errors" => [],
                ]));
            }
            $payment = [
                "staff_id" => $data["staff_id"],
                "for" => $data["for"],
                "date" => $data["date"],
                "salary" => $data["salary"],
                "user_id" => Auth::id(),
                "salary_id" => $staff->salary["id"]
            ];
            $pay = new SalaryPayment($payment);
            $pay->save();
            Calendar::firstOrCreate([
                "date" => date("Y-m-d"),
            ]);
            return response([
                "error" => false,
                "paid" => $pay->toArray()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryPayment  $salaryPayment
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryPayment $salaryPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryPayment  $salaryPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryPayment $salaryPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryPayment  $salaryPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryPayment $salaryPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryPayment  $salaryPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryPayment $salaryPayment)
    {
        //
    }
}
