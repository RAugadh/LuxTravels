<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index')
        ->with([
            'users' => User::all(),
            'roles' => Role::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')
        ->with([
            'roles' => Role::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->role);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'The User has been Created.');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit',
        [
            'roles' => Role::all(),
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
        $request->session()->flash('error', 'User Cannot be edited.');
        return redirect(route('admin.users.index'));
        }
        DB::table('role_user')->where('user_id',$id)->delete();
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->attach($request->role);
        $request->session()->flash('success', 'User details have been Updated.');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'The User has been Deleted.');
        return redirect(route('admin.users.index'));
    }
}
