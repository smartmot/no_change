<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sp = Supplier::query()
            //->select(["name", "ids", "tel", "photo"])
            ->where("status","active");
        $data = $sp->get();
        if ($request->has("filter") && $request->get("filter") === "due"){
            $data = $data->where("due",">", 0);
        }
        if ($request->has("filter") && $request->get("filter") === "paid"){
            $data = $data->where("due", "=",0);
        }
        if ($request->has("search") && $request->has("find")){
            if ($request->get("search") == "name"){
                $sp->where("name", 'like',"%".$request->get("find")."%");
            }else{
                $sp->where("ids", 'like',"%".$request->get("find")."%")
                    ->orderBy("ids", "ASC");
            }
            $data = $sp->get();
        }
        return response(array_values($data->toArray()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "ids" => ["required", "max:12", "unique:suppliers,ids"],
            "name" => ["required", "max:100"],
            "tel" => ["nullable", "max:100"],
            "address" => ["nullable", "max:250"],
            "gender" => ["required", "in:male,female"],
            "note" => ["nullable", "max:250"]
        ]);
        $respone = [
            "error" => true,
        ];

        $image = "images/cache/upload_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/His");
        $foler = "images/";
        $thumb = "6x7";
        if (Storage::disk("local")->exists($image)) {
            Storage::move($image, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(343, 400);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
            $thumb = $cover;
        }

        if ($validator->fails()){
            $respone["errors"] = $validator->errors();
            return response($respone);
        }else{
            $respone["error"] = false;
            $data = $validator->validate();
            $data["status"] = "active";
            $data["photo"] = $thumb;

            $supplier = new Supplier($data);
            $supplier->save();
            return response($respone);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required","max:255"],
            "tel" => ["nullable","max:255"],
            "address" => ["nullable","max:255"],
            "gender" => ["required", "in:male,female"],
            "note" => ["nullable", "max:255"],
        ]);

        if ($validator->fails()){
            $resp = [
                "error" => true,
                "errors" => $validator->errors()
            ];
        }else{
            $data = $validator->validate();
            $supplier->update($data);
            $supplier->save();
            $resp=[
                "error" => false,
                "data" => $supplier->toArray()
            ];
        }
        return response($resp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    public function report(Request $request){
        $validator = Validator::make($request->all(),[
            "supplier_id" => ["required", "exists:suppliers,id"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $invoices = Invoice::query()
                ->where("supplier_id",$data["supplier_id"])
                ->with("payments")
                ->orderBy("date", "desc")
                ->limit(50)
                ->get();
            if ($request->has("filter")){
                switch ($request->get("filter")){
                    case "due":
                        $invoices = $invoices->where("due", ">", 0);
                        break;
                    case "paid":
                        $invoices = $invoices->where("due", "=", 0);
                        break;
                }
            }
            if ($request->has("from") && $request->get("from")!=""){
                $invoices = $invoices
                    ->where("date", ">=", $request->get("from"));
            }
            if ($request->has("to") && $request->get("to")!=""){
                $invoices=$invoices
                    ->where("date", "<=", $request->get("to"));

            }
            return response([
                "error" => false,
                "data" => $invoices->toArray()
            ]);
        }
    }

    public function stock(Request $request){
        $validator = Validator::make($request->all(),[
            "supplier_id" => ["required", "exists:suppliers,id"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => true,
                "errors" => $validator->errors()
            ]);
        }else{
            $data = $validator->validate();
            $items = InvoiceItem::query()->whereHas("invoice", function ($inv){
                $inv->where("supplier_id", $_GET["supplier_id"]);
            })
                ->get()
                ->toArray();
            return response([
                "error" => false,
                "data" => $items
            ]);
        }
    }

    public function update_profile(Supplier $supplier){
        $imagez = "images/cache/upload_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/His");
        $foler = "images/";
        if (Storage::disk("local")->exists($imagez)) {
            Storage::move($imagez, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(343, 400);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
            $thumb = $cover;
            $supplier->photo = $thumb;
            $supplier->save();
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
