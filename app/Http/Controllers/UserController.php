<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
//use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\HandleController;
use App\Http\Controllers\User\ProfilePictureController;
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

            $user = new User($request->validated());
            $user = $this->getFormValues($user, $request, "signup");  
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
     * \details Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.index');
    }

    public function showLogin(){
        return view('user.login');
    }

    /**
     * \details Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        if($user != null){
            $account_id = Auth::user()->account_id;
            $picture = ProfilePictureController::getPictures($account_id);

            return view('user.edit', [
                "id" => $account_id,
                "account_pictures" => $picture,
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
            //Code 1
            //Auth::user()->update($request->all());

            //Code 2
            $user = $this->getFormValues(Auth::user(), $request, "edit");
            Auth::user()->update();

            return view('user.index')->with([
                'status' => 'SUCCESS',
                'message' => 'User profile updated successfully!'
            ]);
        }catch(AuthenticationException $e){
            return view('user.index')->with([
                'status' => 'ERROR',
                'message' => 'User profile failed to update!',
            ]);
        }
        
        return view('user.index')->with([
            'status' => 'ERROR',
            'message' => 'User profile failed to update due to an unknown error!',
        ]);
        
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

    /**
     * Syntactic sugar for getting values from a form.
     * \remarks Does not include user id, email, and password.
     * 
     * @param Request $request
     * @param string $type The type of request such as "edit" and "signup" which iis the same as
     * the route type. It should start with small letter.
     * @return App\Models\User
     */
    private function getFormValues(User $user, Request $request, string $type) : User{
        $birthdate = $request->input($type . "-birthyear") . $request->input($type . "-birthmonth") . $request->input($type . "-birthday");

        $user->username = $request->input($type . "-username");
        $user->handle = HandleController::addAtSign($request->input($type . "-handle"));
        $user->type = "member";
        $user->firstname = $request->input($type . "-firstname");
        $user->middlename = $request->input($type . "-middlename");
        $user->lastname = $request->input($type . "-lastname");
        $user->birthdate = $birthdate;
        $user->gender = trim($request->input($type . "-gender"), "emale");
        $user->country = $request->input($type . "-country");

        switch($type){
            case "edit-sensitive":
            case "signup":
                $user->email = $request->input($type . "-email");
                $user->password_hash = Hash::make($request->input($type . "-password"));
                break;
            case "edit":
                $user->description = $request->input($type . "-description");
                $user->profile_picture_id = $request->input($type . "-profile-picture-id");
                break;
            default;
                break;
        }

        return $user;
    }

    public function setupProfilePicture(User $user, Request $request){
        
    }
}
