<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $posts = auth()->user()->usersCoolPosts()->latest()->get();
            return view('home', ['posts' => $posts]);
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