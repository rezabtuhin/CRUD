<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $incommingField = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);
        $incommingField['password'] = bcrypt($incommingField['password']);
        $user = User::create($incommingField);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incommingField = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $incommingField['email'], 'password' => $incommingField['password']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

}