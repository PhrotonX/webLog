<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function add(){

    }

    public function store(string $type){
        $data = new Picture();

        $requestName = $type . 'image-upload';

        if($request->$file($requestName)){
            $file = $request->file($requestName);
            $filename = $date('YmdHIi').file->getClientOriginalName();
            $file->move(public_path('public/data/img'))
        }
    }

    public function view(){

    }
}
