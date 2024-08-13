<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'Email is already in use');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        } else {
            return back()->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
}
