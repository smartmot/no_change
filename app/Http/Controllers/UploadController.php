<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function upload(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "max:20000", "image"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $name = "cache/post_1". ".jpg";
            $url = $request->upload->storeAs('images', $name, 'local');
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }
    public function crop(){

    }
}
