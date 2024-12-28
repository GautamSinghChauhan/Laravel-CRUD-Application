<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class loginsystem extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Store values in session
        session(['username' => $username, 'password' => $password]);

        return view('output', ['username' => $username, 'password' => $password]);
    }
}
