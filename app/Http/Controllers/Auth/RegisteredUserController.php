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

        handleBirthdate($request);
        
        
        
        $user = new User();

        $user->username = $request->input("signup-username");
        $user->handle = HandleController::addAtSign($request->input("signup-handle"));
        $user->email = $request->input("signup-email");
        $user->password_hash = $request->input("signup-password");
        $user->securepassword = 1;
        $user->newaccount = 1;
        $user->type = "member";
        $user->firstname = $request->input("signup-firstname");
        $user->middlename = $request->input("signup-middlename");
        $user->lastname = $request->input("signup-lastname");
        $user->birthdate = $birthdate;
        $user->age = $age;
        $user->gender = trim($request->input("signup-gender"), "emale");
        $user->country = $request->input("signup-country");
        $user->privacy = "public";

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }

    private function handleBirthdate(Request $request){
        $birthdate = $request->input("signup-birthyear") . $request->input("signup-birthmonth") . $request->input("signup-birthday");

        $timezone = "Asia/Manila";

        $currentDate = new \DateTime($timezone);
        $dateToCompare = new \DateTime($birthdate, new \DateTimeZone($timezone));
        $result = $currentDate->diff($dateToCompare, $timezone);
        $this->age = $result->y;
    }
}
