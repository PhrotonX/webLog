<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    protected $directory = 'public/data/img/';

    public function add(){

    }

    public function store(Request $request, string $requestName){
        $data = new Picture();

        switch($requestName){
            case 'edit-profile-picture':
            case 'upload-profile-picture':
                $tempDir  = $this->directory . Auth::id() . "/profile/picture/";
                break;
            case 'upload-post-picture':
                $tempDir = $this->directory . Auth::id() . "/post/";
                break;
            default:
                $tempDir = $this->directory;
        }
        

        if($request->file($requestName)){
            $file = $request->file($requestName);
            $filename = $date('YmdHIi').file->getClientOriginalName();
            $file->move(public_path($directory), $filename);
            $data['picture_path'] = $filename;
        }

        $data['account_id'] = Auth::user()->account_id;

        $data->save();
        //return view here...
    }

    public function view(){

    }
}
