<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show(){
        return view('user.login');
    }

    public function login(LoginRequest $request){
        try{
            $request->authenticate();

            return view('/');
        }catch(ValidationException $e){
            echo 'Login Error! ' + $e->errorBag() + " " + $e->status();
            return view('user.login');
        }
    }
}
