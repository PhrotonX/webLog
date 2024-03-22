<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\User\HandleController;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show(){
        return view('user.create');
    }

    public function register(RegisterRequest $request){

        try{
            $birthdate = $request->input("signup-birthyear") . $request->input("signup-birthmonth") . $request->input("signup-birthday");

            $timezone = "Asia/Manila";

            $currentDate = new \DateTime($timezone);
            $dateToCompare = new \DateTime($birthdate, new \DateTimeZone($timezone));
            $result = $currentDate->diff($dateToCompare, $timezone);
            $age = $result->y;
            
            $user = new User($request->validated());

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

            auth()->login($user);

            return redirect('/')->with('Registration Success!', "Account Registered successfully!");
        }catch(Exception $e){
            echo $e->getTraceAsString();
        }
    }
}
