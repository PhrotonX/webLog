<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PictureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPictureController extends PictureController
{
    public function store(Request $request, string $requestName){
        $accountId = Auth::id();

        //@TODO: Add post ID into the directory.
        $this->directory .= $accountId . "/post/";
        $this->type = 'post';

        PictureController::store($request, $requestName);
    }
}
