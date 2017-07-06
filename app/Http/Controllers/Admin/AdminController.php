<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Event;
use App\Entries;
use Validator;

class AdminController extends Controller
{
    // Shows home page of admin
    public function show_home(Request $request) {
        if(Session::get('session')->role == 'admin') {
            // Get all events
            $events = Event::paginate(5);
            return view('pages.admin.home')->with('events', $events);
        } else {
            return redirect('/user/home');
        }
    }

    // Shows event add page
    public function show_add(Request $request) {
        if(Session::get('session')->role == 'admin') {
            return view('pages.admin.add');
        } else {
            return redirect('/user/home');
        }
    }

    // Shows event update page
    public function show_update(Request $request, $id) {
        if(Session::get('session')->role == 'admin') {
            $checkEvent = Event::find($id);
            if(count($checkEvent) == 1) {
                return view('pages.admin.update')->with('event', $checkEvent);
            } else {
                return redirect()->back()->with('error', 'There is no such event');
            }
        } else {
            return redirect('/user/home');
        }
    }

    // Shows event by id page
    public function show_event(Request $request, $id) {
        if(Session::get('session')->role == 'admin') {
            $event = Event::find($id);
            return view('pages.admin.event')->with('event', $event);
        } else {
            return redirect('/user/home');
        }
    }

    // Shows entries
    public function show_entries(Request $request) {
        if(Session::get('session')->role == 'admin') {
            return view('pages.admin.entries');
        } else {
            return redirect('/user/home');
        }
    }

    // Shows message
    public function show_add_message(Request $request) {
        if(Session::get('session')->role == 'admin') {
            return view('pages.admin.message');
        } else {
            return redirect('/user/home');
        }
    }

    /*
    * Handles adding new event
    */
    public function do_add(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'rules' => 'required',
            'gameplay' => 'required ',
            'eventhead' => 'required ',
            'cost' => 'required | numeric',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            $data = $request->all();
            $createEvent = Event::create($data);
            if($createEvent) {
                return redirect()->back()->with('success', 'Event added successfully');
            } else {
                return redirect()->back()->with('error', 'Some error. Try again');
            }
        }
    }

    /*
    * Handles updating new event
    */
    public function do_update(Request $request, $id) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'rules' => 'required',
            'gameplay' => 'required ',
            'eventhead' => 'required ',
            'cost' => 'required | numeric',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            // Check if event exists
            $checkEvent = Event::find($id);
            if(count($checkEvent) == 1) {
                $checkEvent->name = $request->input('name');
                $checkEvent->description = $request->input('description');
                $checkEvent->about = $request->input('about');
                $checkEvent->rules = $request->input('rules');
                $checkEvent->gameplay = $request->input('gameplay');
                $checkEvent->eventhead = $request->input('eventhead');
                $checkEvent->cost = $request->input('cost');
                $checkEvent->save();
                return redirect()->back()->with('success', 'Event updated successfully');
            } else {
                return redirect()->back()->with('error', 'There is no such event');
            }
        }
    }

    /*
    * Handles deleteing new event
    */
    public function do_delete(Request $request, $id) {
        // Check if event exists
        $checkEvent = Event::find($id);
        if(count($checkEvent) == 1) {
            $checkEvent->delete();
            return redirect()->back()->with('success', 'Event deleted successfully');
        } else {
            return redirect()->back()->with('error', 'There is no such event');
        }
    }
}
