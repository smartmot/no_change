<?php

namespace App\Http\Controllers;

use App\Models\Scan;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ScanController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "staff_id" => ["required"],
            "month" => ["required"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => false,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $month = date_format(date_create($data["month"]), "m");
            $year = date_format(date_create($data["month"]), "Y");
            $scan = DB::table("scans")
                ->selectRaw("*, DATE(time) as date, MONTH(time) as month, YEAR(time) as year, TIME(time) as times")
                ->where("staff_id", "=", $data["staff_id"])
                ->having("month", "=", $month)
                ->having("year", "=", $year)
                ->get()
                ->groupBy("date")
                ->toArray();
            return response([
                "error" => false,
                "scan" => $scan
            ]);
        }
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
        if ($request->has("keyword")){
            $keyword = $request->get("keyword");
            $staff = Staff::query()->where("id", "=", $keyword)
                ->first();
            if ($staff){
                $check = DB::table("scans")
                    ->selectRaw("*, DATE(time) as date, TIME(time) as times")
                    ->where("staff_id", "=", $staff->id)
                    ->having("date", "=", date("Y-m-d"))
                    ->get()
                    ->toArray();
                if (count($check) >= 2){
                    exit(json_encode([
                        "error" => true,
                        "staff" => $staff->toArray(),
                        "check" => $check
                    ]));
                }
                $scan = new Scan([
                    "staff_id" => $staff->id,
                    "time" => date("Y-m-d H:i:s")
                ]);
                $scan->save();
                return response([
                    "error" => false,
                    "staff" => $staff->toArray(),
                ]);
            }else{
                return response([
                    "error" => true,
                    "staff" => 1,
                ]);
            }
        }else{
            return response([
                "error" => true,
                "staff" => [],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function edit(Scan $scan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scan $scan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scan $scan)
    {
        //
    }
}
