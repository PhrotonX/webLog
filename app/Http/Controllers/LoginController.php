<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show(){
        return view('user.login', ["status" => "none"]);
    }

    /*public function login(LoginRequest $request){
        if($request == null){
            return view('user.login', [
                "status" => "null",
            ]);
        }
        try{
            $request->authenticate();

            return view('index');
        }catch(ValidationException $e){
            return $e->errors();
            /*return view('user.login',[
                "status" => "error",
            ]);*/
        /*}

        
    }*/

    public function login(Request $request){
        if($request == null){
            return view('user.login', [
                "status" => "null",
            ]);
        }
        try{
            $user = new User();

            $user->email = $request->input("login-email");
            $user->password = $request->input("login-password");
            auth()->login($user);

            return view('index');
        }catch(ValidationException $e){
            return $e->errors();
            /*return view('user.login',[
                "status" => "error",
            ]);*/
        }

        
    }
}
