<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($image){
        $path = str_replace("_", "/", $image);
        $path_info = pathinfo($path);
        $name = $path_info["basename"];
        return Storage::download($path, $name);
    }
}
