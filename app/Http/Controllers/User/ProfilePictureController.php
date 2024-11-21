<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PictureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePictureController extends PictureController
{
    public function store(Request $request, string $requestName){
        $accountId = Auth::id();

        $this->directory .= $accountId . "/pfp/";
        $this->type = 'profile_picture';

        PictureController::store($request, $requestName);

        
    }
}
