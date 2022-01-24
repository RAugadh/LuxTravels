<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tour;
use App\Models\ToursModule;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if (Gate::allows('is-user')){
            return view('user.dashboard');
        }
        return view('admin.dashboard');
    }
    public static function home(){
        return view('index')
        ->with([
            'tours' => Tour::all(),
            'modules' => ToursModule::all()
        ]);
    }
}