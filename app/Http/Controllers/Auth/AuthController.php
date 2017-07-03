<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Shows login page
    public function show_register(Request $request) {
        return view('auth.register');
    }
    // Shows login page
    public function show_login(Request $request) {
        return view('auth.login');
    }
    // Shows forgot password page
    public function show_forgot(Request $request) {
        return view('auth.forgot');
    }
    // Shows reset password page
    public function show_reset(Request $request) {
        return view('auth.reset');
    }
}
