<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function showFormLogin()
    {
        return view('admin.login');
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('users.index');
        } else {
            session()->flash('login_error', 'Account not exits!');
            return redirect()->route('login');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
