<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
//use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\HandleController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**/

    public function __construct(){
        //$this->middleware('check.age')->only('create');

        $this->middleware(function($request, $next){
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();

        //echo "index";

        //return view('user.index', compact('users'));

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            "routeType" => "signup",
            "pageTitle" => "Sign Up",
            "form" => [
                "action" => "user.submit",
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {   
        try{
            $birthdate = $request->input("signup-birthyear") . $request->input("signup-birthmonth") . $request->input("signup-birthday");

            $user = new User($request->validated());

            $user->username = $request->input("signup-username");
            $user->handle = HandleController::addAtSign($request->input("signup-handle"));
            $user->email = $request->input("signup-email");
            $user->password_hash = Hash::make($request->input("signup-password"));
            $user->type = "member";
            $user->firstname = $request->input("signup-firstname");
            $user->middlename = $request->input("signup-middlename");
            $user->lastname = $request->input("signup-lastname");
            $user->birthdate = $birthdate;
            $user->gender = trim($request->input("signup-gender"), "emale");
            $user->country = $request->input("signup-country");

            $user->save();

            auth()->login($user);

            return redirect('/')->with([
                'status' => 'SUCCESS',
                'message' => "Account Registered successfully!",
            ]);
        }catch(Exception $e){
            echo $e->getTraceAsString();
        }
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

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/')->with('Login success!', 'Account logged in successfully!');
        }

        return back()->with([
            'status' => 'ERROR',
            'message' => 'The provided credentials do not match our records.',
        ])->onlyInput('login-email');
    }

    public function logout(){
        Auth::logout();
        return redirect('user/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.index');
    }

    public function showLogin(){
        return view('user.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        if($user != null){
            return view('user.edit', [
                "id" => Auth::user()->account_id,
                "routeType" => "edit",
                "pageTitle" => "Edit your profile",
                "form" => [
                    "action" => "user.update",
                ],
            ]);
        }else{
            return view('user.login', [
                "status" => "SESSION_EXPIRED",
                "message" => "Session expired!",
            ]);
        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            Auth::user()->update($request->all());

            return view('user.index')->with([
                'status' => 'SUCCESS',
                'message' => 'User profile updated successfully!',
            ]);
        }catch(AuthenticationException $e){
            return view('user.index')->with([
                'status' => 'ERROR',
                'message' => 'User profile failed to update!',
            ]);
        }
        

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
    private function handleBirthdate(Request $request, string $requestType){
        $birthdate = $request->input($requestType."-birthyear") . $request->input($requestType."-birthmonth") . $request->input($requestType."-birthday");
        
        //Should be moved to User model.
        /*$timezone = "Asia/Manila";

        $currentDate = new \DateTime($timezone);
        $dateToCompare = new \DateTime($birthdate, new \DateTimeZone($timezone));
        $result = $currentDate->diff($dateToCompare, $timezone);
        $age = $result->y;
        */

        return $birthdate;
    }
}
