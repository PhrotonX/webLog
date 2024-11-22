<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Note: This class and all of its associated routes must only be used for
 * reference only.
*/
class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "<h1>Request ID: ".$id."</h1>";

        $results = DB::select('SELECT * FROM ACCOUNTS WHERE ID=?', [1]);
        foreach($results as $accounts){
            echo "<p>Username is <b>".$accounts->username."</b></p>";
            echo "<p>Password is <b>".$accounts->password_hash."</b></p>";
            echo "<p>Email is <b>".$accounts->email."</b></p>";
            echo "<p>Age is <b>".$accounts->age."</b></p>";
            echo "<p>ID is <b>".$accounts->id."</b></p>";
        }
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
        $updated = DB::update("UPDATE accounts SET password_hash='passkey' WHERE ID=?", [1]);
        return $updated;
        //$this->show("select");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
