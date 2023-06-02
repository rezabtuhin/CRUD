<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            return view('home');
        } else {
            return redirect('/login');
        }
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('register');
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('login');
        }
    }
}