<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => 'Home'
        ];

        return view('index', $data);
    }
}
