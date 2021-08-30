<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public function upload(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "image", "max:16125", "min:5"]
        ]);
        if ($validator->fails()){
            $validator->errors()->add("upload", "Invalid file");
            $error = $validator->errors();
            return response([
                "error" => true,
                "errors" => $error
            ]);
        }else{
            $name = "cache/upload_". Auth::id() . ".jpg";
            $request->upload->storeAs('images', $name, 'local');
            return response(
                [
                    "url"=>$name."?ver=".date("y.m.dhis"),
                    "error"=>false,
                ]
            );
        }
    }

    public function crop(Request $request){
        $folder = "images/";
        $file = "cache/upload_". Auth::id() . ".jpg";
        $resp = [
            "url" => $file."?ver=".date("y.m.dhis"),
            "error" => false
        ];
        if ($request->has("cord") && Storage::disk("local")->exists($folder.$file)){
            $cord = json_decode($request->get("cord"), true);
            $image= Image::make("photo/".$file);
            if (isset($cord["r"]) && $cord["r"]!=0){
                switch ($cord["r"]){
                    case -90:
                        $image->rotate(90);
                        break;
                    case 90:
                        $image->rotate(-90);
                        break;
                    default:
                        $image->rotate($cord["r"]);
                        break;
                }
            }
            $image->crop(
                number_format($cord["width"], 0, "", ""),
                number_format($cord["height"], 0,"",""),
                number_format($cord["x"], 0, "", ""),
                number_format($cord["y"], 0, "",""),
            );
            $image->save();

            return response($resp);
        }else{
            $resp["error"] = true;
            return response($resp);
        }
    }

    public function invoice(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "image", "max:16125", "min:5"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors();
            return response([
                "error" => true,
                "errors" => $error
            ]);
        }else{
            $name = "cache/inv_". Auth::id() . ".jpg";
            $request->upload->storeAs('images', $name, 'local');
            $file = "photo/".$name;
            $image = Image::make($file);
            $image->save();

            return response(
                [
                    "url"=>"inv.jpg"."?ver=".date("y.m.dhis"),
                    "error"=>false,
                ]
            );
        }
    }

    public function items(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "image", "max:16125", "min:5"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors();
            return response([
                "error" => true,
                "errors" => $error
            ]);
        }else{
            $name = "cache/items_". Auth::id() . ".jpg";
            $request->upload->storeAs('images', $name, 'local');
            $file = "photo/".$name;
            $image = Image::make($file);
            $image->save();

            return response(
                [
                    "url"=>$name."?ver=".date("y.m.dhis"),
                    "error"=>false,
                ]
            );
        }
    }

    public function show_invoice(){
        $name = "photo/cache/inv_". Auth::id() . ".jpg";
        $image = Image::make($name);
        if ($image->getWidth() < $image->getHeight()){
            $dem = $image->getWidth();
        }else{
            $dem = $image->getHeight();
        }
        $image->resizeCanvas($dem,$dem);
        return $image->response();
    }

    public function crop_item(Request $request){
        $folder = "images/";
        $newname = date("Y/m/d/His").".jpg";
        $file = "cache/items_". Auth::id() . ".jpg";
        $resp = [
            "url" => $newname,
            "error" => false
        ];
        if ($request->has("cord") && Storage::disk("local")->exists($folder.$file)){
            $cord = json_decode($request->get("cord"), true);
            $image= Image::make("photo/".$file);
            if (isset($cord["r"]) && $cord["r"]!=0){
                switch ($cord["r"]){
                    case -90:
                        $image->rotate(90);
                        break;
                    case 90:
                        $image->rotate(-90);
                        break;
                    default:
                        $image->rotate($cord["r"]);
                        break;
                }
            }
            $image->crop(
                number_format($cord["width"], 0, "", ""),
                number_format($cord["height"], 0,"",""),
                number_format($cord["x"], 0, "", ""),
                number_format($cord["y"], 0, "",""),
            );
            $image->save();
            Storage::disk("local")->move($folder.$file, $folder.$newname);
            return response($resp);
        }else{
            $resp["error"] = true;
            return response($resp);
        }
    }

    public function check_item(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => ["required"],
            "qty" => ["required"],
            "unit_price" => ["required"],
            "photo" => ["required"]
        ]);
        $resp = [
            "error" => false
        ];
        $folder = "images/";
        if ($validator->fails()){
            $resp["error"] = true;
            $resp["errors"] = $validator->errors();
            return response($resp);
        }else{
            $data = $validator->validate();
            if (Storage::disk("local")->exists($folder.$data["photo"])){
                $resp["data"] = $data;
                return response($resp);
            }else{
                $validator->errors()->add("photo", "Upload a photo for this item");
                $resp["error"] = true;
                $resp["errors"] = $validator->errors();
                return response($resp);
            }
        }
    }
}
