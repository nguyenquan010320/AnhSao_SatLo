<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            return view('pages.login');
        }
    }

    public function login(Request $request ) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'You are logged in!');
        }else{
            return redirect()->back()->with('error', 'Tài khoản của bạn không đúng');
        }
        
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
