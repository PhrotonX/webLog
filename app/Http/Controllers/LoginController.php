<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show(){
        return view('user.login', ["status" => "none"]);
    }

    public function login(LoginRequest $request){
        if($request == null){
            return view('user.login', [
                "status" => "null",
            ]);
        }
        try{
            $request->authenticate();

            //Log::info(json_encode($request));
            
            return view('/');
        }catch(ValidationException $e){
            return $e->errors();
            /*return view('user.login',[
                "status" => "error",
            ]);*/
        }
    }
}
