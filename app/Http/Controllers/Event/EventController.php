<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    // Show all events
    public function show_all(Request $request) {
        return view('pages.event.list');
    }
    // Show event by id
    public function show_byid(Request $request) {
        return view('pages.event.single');
    }
    // Show register
    public function show_register(Request $request) {
        return view('pages.event.register');
    }
}
