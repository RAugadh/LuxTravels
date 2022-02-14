<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Tickets;
use App\Models\User;
use App\Models\Tour;
use App\Models\ToursModule;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if (Gate::allows('is-admin')){

            return view('admin.dashboard')->with([
                'users' => User::latest()->take(4)->get(),
                'roles' => Role::all(),
                'tickets' =>Tickets::latest()->take(4)->get(),
                'tours' => Tour::all(),
                't_users'=> User::all(),
            ]);
        }
        return view('user.dashboard')->with([
            'tours' => Tour::all(),
            'tickets' =>Tickets::latest()->get(),
        ]);

    }
    public static function home(){
        return view('index')
        ->with([
            'tours' => Tour::all(),
            'modules' => ToursModule::all()
        ]);
    }
}
