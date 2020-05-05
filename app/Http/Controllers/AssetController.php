<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function image($filename)
    {
        return $filename;
        //return Storage::download('name'.'file.jpg');
        // $url = Storage::url('file.jpg');

    }

}
