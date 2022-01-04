<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $isadmin=Auth::user()->isadmin;

        if ($isadmin=='1'){
            return view('admin.dash');
        }
        else{
            return view('home');
        }
    }
}