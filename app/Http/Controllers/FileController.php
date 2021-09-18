<?php

namespace App\Http\Controllers;

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
        return view("receipt");
    }

    public function pdf(){

        $html = "<div></div>";
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
        $mpdf->WriteHTML(Response::view("receipt")->header("Content-Type", "text/html"));
        $mpdf->Output(storage_path("app/receipts/receipt1.pdf"));
    }

    public function save(Request $request){

    }
}
