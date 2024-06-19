<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HandleController extends Controller
{
    public static function addAtSign($handle){
        if(!str_starts_with($handle, "@")){
            return "@" . $handle;
        }
        
        return $handle;
    }
    public static function removeAtSign($handle){
        if(str_starts_with($handle, "@")){
            return str_replace("@", "", $handle, 1);
        }
        
        return $handle;
    }
}
