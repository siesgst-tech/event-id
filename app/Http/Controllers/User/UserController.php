<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Shows home
    public function show_home(Request $request) {
        return view('pages.user.home');
    }

    // Shows user's settings
    public function show_settings(Request $request) {
        return view('pages.user.settings');
    }

    // Shows user's entries
    public function show_entries(Request $request) {
        return view('pages.user.entries');
    }

    // Shows play events
    public function show_play(Request $request) {
        return view('pages.user.play');
    }
}
