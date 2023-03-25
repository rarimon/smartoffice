<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //


    public function profile_page()
    {
        return view('admin.profile.index');
    }


    //update profile 
    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),

        ]);
        return back()->with('success', 'User Name Update Successfully !');
    }

    //password update

    public function password_update(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'old_password' => 'required',
        ]);


        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('success_pas', 'Password Update Successfull !');
        } else {
            return back()->with('wrong_pas', 'Old Password No Match !');
        }
    }


    //photo update 

    public function photo_update(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
    }
}
