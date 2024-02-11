<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show(){
        return view('user.register');
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        auth()->login();

        return redirect('/')->with('Registration Success!', "Account Registered successfully!");
    }
}
