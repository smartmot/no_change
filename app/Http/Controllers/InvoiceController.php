<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Calendar;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\Setting;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class InvoiceController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "id"=> ["required", "exists:suppliers,id"]
        ]);
        if ($validator->fails()){
            return response([
                "error" => $validator->errors(),
            ]);
        }else{
            $data = $validator->validate();
            $invoices = Invoice::query()
                ->where("supplier_id",$data["id"])
                ->limit(100)
                ->get();
            return response([
                "error" => false,
                "data" => $invoices->toArray()
            ]);
        }
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
            "supplier_id" => ["required", "exists:suppliers,id"],
            "no" => ["required","unique:invoices,no"],
            "name" => ["required"],
            "date" => ["required", "date"],
            "time" => ["required"],
            "paid" => ["required"],
            "pay_date" => ["required", "date"],
            "items" => ["required"],
            "currency" => ["required","in:usd,riel,bath"],
        ]);
        $inv = "images/cache/inv_". Auth::id() . ".jpg";
        if ($validator->fails()){
            exit(json_encode([
                "error"=> true,
                "errors" => $validator->errors()
            ]));
        }
        $data = $validator->validate();
        if ($data["paid"] === ""){
            exit(json_encode([
                "error" => true,
                "errors" => [0=>"បង់លុយ"]
            ]));
        }
        if (!Storage::disk("local")->exists($inv)){
            exit(json_encode([
                "error" => true,
                "errors" => [
                    "photo" => [0=>"អត់មានរូបថតវិក័យប័ត្រ"]
                ]
            ]));
        }
        $items = json_decode($data["items"], true);
        if (count($items) === 0){
            exit(json_encode([
                "error"=>true,
                "errors" => [
                    "items" => [0=>"បុងទទេរ"]
                ]
            ]));
        }
        $newname = date("Y/m/d/His");
        Storage::disk("local")->move($inv,"images/".$newname.".jpg");
        $photo = "photo/".$newname.".jpg";
        $image = Image::make($photo);
        if ($image->getWidth() < $image->getHeight()){
            $dem = $image->getWidth();
        }else{
            $dem = $image->getHeight();
        }
        $image->resizeCanvas($dem,$dem);
        $image->resize(200,200);
        $image->save("photo/".$newname."_thumb.jpg");
        $invd = [
            "supplier_id" => $data["supplier_id"],
            "no" => $data["no"],
            "photo" => $newname,
            "currency" => $data["currency"],
            "name" => $data["name"],
            "date" => $data["date"],
            "time" => $data["time"],
            "user_id" => Auth::id(),
        ];
        $invoice = new Invoice($invd);
        $invoice->save();
        $invoice_id = $invoice->id;
        $payment = new InvoicePayment([
            "invoice_id" => $invoice_id,
            "user_id" => Auth::id(),
            "paid" => $data["paid"],
            "pay_date" => $data["pay_date"],
        ]);
        $payment->save();
        $log = new  AdminActivity([
            "user_id" => Auth::id(),
            "act"=>"បានបញ្ចូលវិក័យប័ត្រ លេខ : ".$invd["no"],
            "reference" => $invoice_id
        ]);
        $log->save();
        foreach ($items as $key=>$item){
            $code = $data["no"] . "-0".($key+1);
            $barcode = date("Y/m/d/").$code.".svg";
            Storage::disk("local")->put("images/b/".$barcode,DNS1D::getBarcodeSVG($code, 'C128',1,50,"black", true));
            $iphoto = "photo/".$item["photo"];
            $img = Image::make($iphoto);
            $iname = str_replace("photo/", "", $img->dirname) ."/". $img->filename;
            $img->resize(200,200);
            $img->save(($img->dirname) ."/". $img->filename."_thumb.jpg");
            $itm = new InvoiceItem([
                "invoice_id" => $invoice_id,
                "photo" => $iname,
                "name" => $item["name"],
                "ids" => $code,
                "unit_price" => $item["unit_price"],
                "barcode_image" => $barcode,
            ]);
            $itm->save();
            $stock = new Stock([
                "item_id" => $itm->id,
                "qty" => $item["qty"],
                "type" => "stock_in",
                "date" => date("Y/m/d H:i:s"),
                "note"=> "ចូលស្តុក"
            ]);
            $stock->save();
        }
        Calendar::firstOrCreate([
            "date" => date("Y-m-d"),
        ]);

        return response([
            "error" => false,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return "Hei";
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:255"]
        ]);
        if ($validator->fails()){
            $res = [
                "error" => true,
                "errors" => $validator->errors(),
            ];
        }else{
            $res = [
                "error" => false,
            ];
            $invoice->update($validator->validate());
            $invoice->user_id = Auth::id();
            $invoice->save();
            $log = new  AdminActivity([
                "user_id" => Auth::id(),
                "act"=>"បានកែឈ្មោះវិក័យប័ត្រ លេខ : ".$invoice["no"],
                "reference" => $invoice->id
            ]);
            $log->save();
        }
        return response($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
