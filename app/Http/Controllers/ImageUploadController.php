<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    protected $directory = 'data/img/';
    protected $errorImage = 'res/img/question_mark.png';
    protected $type = 'post';

    public function add(){

    }

    public function store(Request $request, string $requestName){
        //Create model object.
        $data = new Picture();
        $tempDir = "";
        $accountId = Auth::id();

        //Setup filepath.
        switch($requestName){
            case 'edit-profile-picture':
            case 'upload-profile-picture':
                $tempDir  = $this->directory . $accountId . "/pfp/";
                $this->type = 'profile_picture';
                break;
            case 'edit-profile-banner':
            case 'upload-profile-banner':
                $tempDir  = $this->directory . $accountId . "/banner/";
                $this->type = 'profile_banner';
                break;
            case 'upload-post-picture':
                //@TODO: Add post ID into the directory.
                $tempDir = $this->directory . $accountId . "/post/";
                break;
            default:
                $tempDir = $this->directory . $accountId;
        }

        //Handle image
        if($request->file($requestName)){
            //Get the image
            $file = $request->file($requestName);

            //Add filename and filepath into the image
            $filename = date('YmdHIi') . '_' . $file->hashName();
            $filepath = $tempDir . $filename;

            //Move the image into the directory set initially.
            $file->move(public_path($tempDir), $filepath);

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
