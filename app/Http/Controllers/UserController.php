<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $users = User::all();

        echo "index";

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "store";

        /*$birthdate = $data['signup-birthyear'] . $data['signup-birthmonth'] . $data['signup-birthday'];

        $dateTimeInterval = new DateTimeInterval();
        $result = $dateTimeInterval->diff(new DateTimeInterval($birthdate));
        $age = $result->y;*/

        $this->validate($request, [
            'signup-username' => 'required',
            'signup-email' => 'required',
            'password_hash' => 'required',
            'birthdate' => 'required',
            'age' => 'required'
        ]);
        
        $user = new User();

        //$user->username = $data["signup-username"];
        $user->username = $request->input("signup-username");
        $user->handle = $request->input("signup-handle");
        $user->email = $request->input("signup-email");
        $user->password_hash = $request->input("signup-password");
        $user->securepassword = 1;
        $user->newaccount = 1;
        $user->type = "member";
        $user->firstname = $request->input("signup-firstname");
        $user->middlename = $request->input("signup-middlename");
        $user->lastname = $request->input("signup-lastname");
        $user->birthdate = "19700101";
        $user->age = "18";
        $user->gender = $request->input("signup-gender");
        $user->country = $request->input("signup-country");
        $user->privacy = "public";

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
