<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logon()
    {
        return view('Admin.logon');
    }

    public function postLogon(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error', 'Sai tài khoản');
    }
}
