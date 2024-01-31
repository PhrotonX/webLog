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
        $data = $request->all();

        /*$birthdate = $data['signup-birthyear'] . $data['signup-birthmonth'] . $data['signup-birthday'];

        $dateTimeInterval = new DateTimeInterval();
        $result = $dateTimeInterval->diff(new DateTimeInterval($birthdate));
        $age = $result->y;*/

        $this->validate($request, [
            'signup-username' => 'required',
            'signup-email' => 'required',
            'password' => 'required',
            'birthdate' => 'required',
            'age' => 'required'
        ]);

        User::create([
            'username' => $data['signup-username'],
            'email' => $data['signup-email'],
            'password' => $data['signup-password'],
            'firstname' => $data['signup-firstname'],
            'middlename' => $data['signup-middlename'],
            'lastname' => $data['signup-lastname'],
            'birthdate' => '20240123',
            'age' => '18',
            'country' => $data['signup-country'],
            'gender' => $data['signup-gender'],
            'type' => 'member'
        ]);

        echo $data["signup-username"];

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
