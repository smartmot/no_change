<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function list(){

    }

    public function report(){

    }

    public function delete_scan(Request $request){
        $validator = Validator::make($request->all(),[
            "date" => ["required", "date"],
            "staff_id" => ["required", "exists:staff,id"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => [
                    "date" => ["ការលុប បរាជ័យ!"]
                ]
            ]);
        }else{
            $data = $validator->validate();
            $to_del = Scan::query()
                ->where("time", "LIKE",  "%".$data["date"]."%")
                ->where("staff_id", "=", $data["staff_id"])
                ->delete();
            return response([
                "error" => false,
            ]);
        }
    }
}
