<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function getUserData($id){
        $user = new User();
        $user = User::find($id);
        \Log::info('Authenticated user id: ' . $id);
        if($user){
            return [
                'id' => $id,
                'username' => $user->username,
                'handle' => $user->handle
            ];
        }

        //return null;
    }
}
