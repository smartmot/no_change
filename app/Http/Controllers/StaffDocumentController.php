<?php

namespace App\Http\Controllers;

use App\Models\StaffDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class StaffDocumentController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doc = StaffDocument::query()
            ->where("staff_id", "=", $request->get("staff_id"))
            ->get()
            ->toArray();
        return response($doc);
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
            "upload" => ["required", "image", "max:16125"]
        ]);

        if ($validator->fails()){
            exit(json_encode([
                "error" => false,
            ]));
        }
        $data = $validator->validate();
        $name = date("Y/m/d/His");
        $ext = ".".$request->upload->getClientOriginalExtension();
        $request->upload->storeAs('images', $name.$ext, 'local');
        $doc = new StaffDocument([
            "staff_id" => $data["staff_id"],
            "url" => $name.$ext,
            "user_id" => Auth::id(),
        ]);
        $doc->save();
        $img = Image::make("photo/".$name.$ext);
        if ($img->width() > $img->height()){
            $img->resizeCanvas($img->height(), $img->height());
        }else{
            $img->resizeCanvas($img->width(), $img->width());
        }
        $img->resize(240,240);
        $img->save("photo/".$name."_thumb".$ext);
        return response([
            "error" => true,
            "data" => $doc->toArray()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffDocument  $staffDocument
     * @return \Illuminate\Http\Response
     */
    public function show(StaffDocument $staffDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffDocument  $staffDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffDocument $staffDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffDocument  $staffDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffDocument $staffDocument)
    {
        //
    }
}
