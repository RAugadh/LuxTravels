<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        // dd($request);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('photo'))
        {
            $destination = 'uploads/profile/'.$user->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/profile', $filename);
            $user->photo = $filename;
        }
        $user->update();
        $request->session()->flash('success', 'Profile Has been Updated.');
        return redirect(url('dashboard'));
    }
}