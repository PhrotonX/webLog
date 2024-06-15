<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show(){
        return view('user.login', ["status" => "none"]);
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();


        if(!Auth::validate($credentials)):
            return redirect()->to('user/login')->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user){
        return redirect()->intended();
    }

    /*public function login(LoginRequest $request){
        if($request == null){
            return view('user.login', [
                "status" => "null",
            ]);
        }
        try{
            $request->authenticate();

            $userData = Auth::user();
            if(Auth::check()){
                return view('index', $userData);
            }else{
                return view('index', [
                    'error' => 'null',
                ]);
            }

            return view('index');
        }catch(ValidationException $e){
            return $e->errors();
            /*return view('user.login',[
                "status" => "error",
            ]);*/
        /*}

        
    }*/
        
    /*public function login(Request $request){
        if($request == null){
            return view('user.login', [
                "status" => "null",
            ]);
        }
        try{
            $user = new User();

            $user->email = $request->input("login-email");
            $user->password = $request->input("login-password");
            auth()->login($user);

            return redirect('/')->with('Log Success!', "Account Logged In successfully!");
            
            // $userData = $this->getUserData(Auth::id());
            /*$userData = Auth::user();
            if(Auth::check()){
                return view('index', $userData);
            }else{
                return view('index', [
                    'error' => 'null',
                ]);
            }*/
            
            //HomeController::index();
        /*}catch(ValidationException $e){
            return $e->errors();
            /*return view('user.login',[
                "status" => "error",
            ]);*/
        /*}

        
    }*/
}
