<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // direct  Login page
    public function LoginPage()
    {
        return view('login');
    }

    // direct Register page
    public function RegisterPage()
    {
        return view('register');
    }

    // direct dashboard
    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
       return redirect()->route('Catergory#list');
        }
        return redirect()->route('user#home');
    }
}
