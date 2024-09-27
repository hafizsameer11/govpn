<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginshow()
    {

        return view('auth.login');
    }
    public function registershow($id = null)
    {
        return view('auth.register', compact('id'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return redirect()->intended('dashboard');
        }

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid username/email or password']);
    }

}
