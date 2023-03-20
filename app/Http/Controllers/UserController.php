<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller
{

    //user login check
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function user_list()
    {

        $user_info = User::latest()->paginate(5);
        $total_user = User::count();
        return view('admin.user.index', [
            'user_info' => $user_info,
            'total_user' => $total_user,
        ]);
    }

    public function insert_user()
    {

        return view('admin.user.insert');
    }

    //add user method
    public function user_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'address' => 'required',
            // 'password' => [
            //     'required',
            //     'min:6',
            //     'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     'confirmed'
            // ]
        ]);

        User::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'User Added Successfull !');
    }
}
