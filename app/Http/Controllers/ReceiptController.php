<?php

namespace App\Http\Controllers;

use App\Models\Receipt\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class ReceiptController extends Controller
{
    public function pdf($receipt_id=null, $receipt_dir=""){
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            "format" =>[148,210],
            'fontDir' => public_path("font"),
            'fontdata' => [
                "moul" => [
                    'R' => "Moul.ttf",
                    'useOTL' => 0xFF,
                ],
                "khmerosbokor" => [
                    'R' => "KhmerOSbokor.ttf",
                    'useOTL' => 0xFF,
                ],
                "khmerossiemreap" => [
                    'R' => "KhmerOSsiemreap.ttf",
                    'useOTL' => 0xFF,
                ]
            ],
            'default_font' => 'khmerossiemreap',
            'margin_top' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            "orientation" => "P"
        ]);
        $sale = Receipt::query()
            ->where("id", "=", $receipt_id)
            ->with("customer")
            ->with("items")
            ->first();
        $mpdf->WriteHTML(Response::view("receipt",[
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

        ])->header("Content-Type", "text/html"));
        $mpdf->Output(storage_path("app/receipts/".$receipt_dir));
    }
}
