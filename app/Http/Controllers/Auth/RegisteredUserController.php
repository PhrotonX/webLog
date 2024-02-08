<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller\User\HandleController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    private $age = 0;
    private $birthdate = 0;
    public function create(){
        return view('user.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'signup-username' => ['required', 'string', 'max:255'],
            'signup-email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'signup-password' => ['required', 'confirmed', Rules\Password::defaults()],
            'signup-handle' => ['required', 'regex:[@]\w'],
        ]);

        $user = User::query("SELECT FROM accounts WHERE email" + $request->input("login-email"));
        if($user->password === $request->input("login-password")){
            event(new Registered($user));

            Auth::login($user);
        }

        

        return response()->noContent();
    }

    
}
