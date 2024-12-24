<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('fe.login');
    }
    public function singup()
    {
        return view('fe.singup');
    }
    public function postSingup(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('login');
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        }
        return redirect()->back()->with('error', 'Đăng nhập thất bại');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
