<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilePictureUploadController extends Controller
{
    public function store(string $requestName){
        $data = new Picture();

        if($request->$file($requestName)){
            $file = $request->file($requestName);
            $filename = $date('YmdHIi').file->getClientOriginalName();
            $file->move(public_path('public/data/img'), $filename);
            $data['picture_path'] = $filename;
        }

        $data->save();
        //return view here...
    }
}
