<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Shows home page of admin
    public function show_home(Request $request) {
        return view('pages.admin.home');
    }

    // Shows event add page
    public function show_add(Request $request) {
        return view('pages.admin.add');
    }

    // Shows event update page
    public function show_update(Request $request) {
        return view('pages.admin.update');
    }

    // Shows event by id page
    public function show_event(Request $request) {
        return view('pages.admin.event');
    }

    // Shows entries
    public function show_entries(Request $request) {
        return view('pages.admin.entries');
    }
}
