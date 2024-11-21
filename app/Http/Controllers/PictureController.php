<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    public const IMAGE_DIRECTORY = 'data/img/';
    protected $directory = 'data/img/';
    protected $errorImage = 'res/img/question_mark.png';
    protected $type = 'post';

    public function add(){

    }

    public function store(Request $request, string $requestName){
        //Create model object.
        $data = new Picture();
        $accountId = Auth::id();

        //Handle image
        if($request->file($requestName)){
            //Get the image
            $file = $request->file($requestName);

            //Add filename and filepath into the image
            $filename = date('YmdHIi') . '_' . $file->hashName();
            $filepath = $this->directory . $filename;

            //Move the image into the directory set initially.
            $file->move(public_path($this->directory), $filepath);

            //Put the filepath into the DB
            $data['picture_path'] = $filepath;
        }else{
            //Put the erorr image filepath into the DB
            $data['picture_path'] = $this->errorImage;

            //Display debug message
            echo $request->file($requestName);
        }

        //Set the type of the image, be it banner, pfp, or post
        $data['type'] = $this->type;

        //Save the account id.
        $data['account_id'] = $accountId;

        $data->save();
        //return view here...
    }

    public function view(){

    }
}
