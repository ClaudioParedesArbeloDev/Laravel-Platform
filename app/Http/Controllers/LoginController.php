<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view ('login');
    }

    public function store()
    {
        $credentials = request()->only('email', 'password');

        $remember = request()->filled('remember');

        if(Auth::attempt($credentials, $remember)) {
            request()->session()->regenerate();
            return redirect('dashboard');
        };
        return redirect('login');
    }

    public function register()
    {
        return view ('users.create');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
