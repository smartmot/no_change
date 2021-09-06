<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::query()
            ->limit(50);
        if ($request->has("keyword")){
            if (is_numeric($request->get("keyword"))){
                $customers->where("id","=",$request->get("keyword"));
            }else{
                $customers->where("name","like","%".$request->get("keyword")."%");
            }
        }
        return response($customers->get()->toArray());
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
            "name" => ["required", "max:255"],
            "gender" => ["required", "in:male,female"],
            "tel" => ["nullable", "max:255"],
            "address" => ["nullable", "max:255"],
            "note" => ["nullable", "max:255"],
        ]);
        $name = date("Y/m/d/His");
        $folder = "images/";
        $file = "cache/upload_". Auth::id() . ".jpg";
        if ($validator->fails()){
            $resp = [
                "error" => true,
                "errors" => $validator->errors()
            ];
        }else{
            $cus = $validator->validate();
            if (Storage::disk("local")->exists($folder.$file)){
                Storage::disk("local")->move($folder.$file, $folder.$name.".jpg");
                $file_dir = "photo/".$name.".jpg";
                $photo = Image::make($file_dir);
                $photo->resize(343, 400);
                $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
                $cus["photo"]= $name;
            }else{
                $cus["photo"] = null;
            }
            $customer = new Customer($cus);
            $customer->save();
            $cus["id"] = $customer->id;
            $resp = [
                "error" => false,
                "customer" => $cus
            ];
        }
        return response($resp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:255"],
            "gender" => ["required", "in:male,female"],
            "tel" => ["nullable", "max:255"],
            "address" => ["nullable", "max:255"],
            "note" => ["nullable", "max:255"],
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $customer->update($data);
            $customer->save();
            return response([
                "error" => false,
                "data"=> $data
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function update_photo(Customer $customer){
        $imagez = "images/cache/upload_". Auth::id() . ".jpg";
        $cover = date("Y/m/d/His");
        $foler = "images/";
        if (Storage::disk("local")->exists($imagez)) {
            Storage::move($imagez, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(343, 400);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
            $thumb = $cover;
            $customer->photo = $thumb;
            $customer->save();
            return response([
                "error" => false,
            ]);
        }else{
            return response([
                "error" => true,
            ]);
        }
    }
}
