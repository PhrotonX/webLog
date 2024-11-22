<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $pageData = [
            'pageTitle' => 'Home',
        ];

        return view('index', $pageData);
            //->with('pageData', $pageData)
            //->with('userData', $userData);
    }
}
