<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Receipt\Receipt;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class FileController extends Controller
{
    public function svg6x7(){
        return Response::view("svg/6x7")->header('Content-Type', "image/svg+xml");
    }

    public function svgprofile(){
        return Response::view("svg/profile")->header('Content-Type', "image/svg+xml");
    }

    public function barcode($code){
        return Response::make(DNS1D::getBarcodeSVG($code, 'C128',1,50,"black", true))->header('Content-Type', "image/svg+xml");
    }

    public function a4jpg(){
        return Response::view("a4")->header('Content-Type', "text/text");
    }

    public function a5(){
        $sale = Receipt::query()
            ->where("id", "=", 1)
            ->with("customer")
            ->with("items")
            ->first();
        return view("receipt")->with([
            "receipt" => $sale->toArray(),
            "money" => function($money,$currency){
                switch ($currency){
                    case "riel":
                        return "៛". number_format($money, 0, "", ",");
                        break;
                    case "usd":
                        return "$".number_format($money, 2, ".", ",");
                        break;
                    case "bath":
                        return "&#3647;". number_format($money, 0, "", ",");
                        break;
                    default:
                        return "$".$money;
                        break;
                }
            }
        ]);
    }

    public function pdf(){
        $pdf = new ReceiptController();
        $pdf->pdf();
    }

    public function save(Request $request){

    }
}
