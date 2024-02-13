<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show(){
        return view('user.login', ["status" => "none"]);
    }

    public function login(LoginRequest $request){
        try{
            $request->authenticate();

            return view('index');
        }catch(ValidationException $e){
            return view('user.login',[
                "status" => "error",
            ]);
        }
    }
}
