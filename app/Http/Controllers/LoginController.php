<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show(){
        return view('user.login', ["status" => "none"]);
    }

    public function login(Request $request) : RedirectResponse{
        $validatedData = $request->validate([
            'login-email' => ['required', 'email'],
            'login-password' => ['required']
        ]);

        $credentials = [
            'email' => $validatedData['login-email'],
            'password' => $validatedData['login-password'],
        ];

        //$credentials['password'] = bcrypt($credentials['password']);

        //Log::info('Attempting login with email: ' . $credentials['email']);
        //Log::info('Attempting login with password: ' . $credentials['password']);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            //Log::info('Login successful for email: ' . $credentials['email']);
            //Log::info('Login successful for password: ' . $credentials['password']);

            return redirect('/')->with('Login success!', 'Account logged in successfully!');
            //return redirect()->intended('dashboard');
        }

        //Log::warning('Login failed for email: ' . $credentials['email']);
        //Log::warning('Login failed for password: ' . $credentials['password']);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('login-email');
    }
}
