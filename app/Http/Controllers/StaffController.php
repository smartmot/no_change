<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staff = Staff::query()
            ->limit(50);
        if ($request->has("keyword") && $request->has("mode")){
            switch ($request->get("mode")){
                case "id":
                    $staff
                        ->where($request->get("mode"), "=", $request->get("keyword"));
                    break;
                case "name":
                    $staff
                        ->where("name", "LIKE", "%".$request->get("keyword")."%");
                    break;
            }
        }
        return response($staff->get()->toArray());
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
            "department" => ["required", "max:255"],
            "birthdate" => ["required", "date"],
            "start_date" => ["required", "date"],
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $image = "images/cache/upload_". Auth::id() . ".jpg";

            $cover = date("Y/m/d/His");
            $foler = "images/";
            $thumb = null;
            if (Storage::disk("local")->exists($image)) {
                Storage::move($image, $foler.$cover. ".jpg");
                $photo = Image::make("photo/".$cover. ".jpg");
                $photo->resize(343, 400);
                $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
                $thumb = $cover;
            }
            $data["photo"] = $thumb;
            $data["status"] = "active";
            $staff = new Staff($data);
            $staff->save();
            return response([
                "error" => false
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:255"],
            "gender" => ["required", "in:male,female"],
            "tel" => ["nullable", "max:255"],
            "address" => ["nullable", "max:255"],
            "note" => ["nullable", "max:255"],
            "department" => ["required", "max:255"],
            "birthdate" => ["required", "date"],
            "start_date" => ["required", "date"],
        ]);

        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $staff->update($data);
            $staff->save();
            return response([
                "error" => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }

    public function update_photo(Staff $staff){
        $imagez = "images/cache/upload_". Auth::id() . ".jpg";
        $cover = date("Y/m/d/His");
        $foler = "images/";
        if (Storage::disk("local")->exists($imagez)) {
            Storage::move($imagez, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(343, 400);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
            $thumb = $cover;
            $staff->photo = $thumb;
            $staff->save();
            return response([
                "error" => false,
            ]);
        }else{
            return response([
                "error" => true,
            ]);
        }
    }

    public function history(Staff $staff){

    }

    public function docs(Staff $staff){

    }
}
