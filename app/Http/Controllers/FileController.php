<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

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
        return view("a5");
    }
}
