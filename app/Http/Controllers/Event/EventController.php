<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Entry;
use App\Message;
use Session;
use Validator;
use DB;

class EventController extends Controller
{
    // Show all events
    public function show_all(Request $request) {
        $events = Event::paginate(5);
        return view('pages.event.list')->with('events', $events);
    }

    // Show event by id
    public function show_byid(Request $request, $id) {
        $event = Event::find($id);
        $entry = Entry::where('user_id', Session::get('session')->id)->where('event_id', $id)->first();
        if(count($entry) == 1) {
            $can_register = false;
        } else {
            $can_register = true;
        }
        if(count($event) == 1) {
            return view('pages.event.single')->with('event', $event)->with('can_register', $can_register);
        } else {
            return redirect()->back()->with('error', 'There is no such event');
        }
    }

    // Shows message
    public function show_add_message(Request $request, $id) {
        if(Session::get('session')->role == 'eventhead' || Session::get('session')->role == 'admin') {
            $event = Event::find($id);
            if(count($event) == 1) {
                $messages = DB::table('messages')
                            ->join('events', 'messages.event_id', 'events.id')
                            ->select('messages.*', 'events.name')
                            ->where('event_id', $id)->paginate(5);
                return view('pages.event.message')->with('messages', $messages);
            } else {
                return redirect('/user/home')->with('error', 'There is no such event');
            }
        } else {
            return redirect('/user/home');
        }
    }

    /*
    * Handles registration of an event for user
    */
    public function do_register(Request $request, $id) {
        $session = Session::get('session');
        $user_id = $session->id;
        $event_id = $id;
        // Check for event
        $event = Event::find($id);
        if(count($event) == 1) {
            // Get all details ready for entering
            $newEntry = new Entry;
            $newEntry->event_id = $event_id;
            $newEntry->user_id = $user_id;
            $newEntry->status = '0';
            $newEntry->cost = $event->cost;
            $newEntry->save();
            return redirect()->back()->with('success', 'Registered for this event');
        } else {
            return redirect('/user/home')->with('error', 'There is no such event');
        }
    }

    /*
    * Handles adding a message of an event
    */
    public function do_add_message(Request $request, $id) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            $event = Event::find($id);
            if(count($event) == 1) {
                // Get all details ready for entering
                $newMessage = new Message;
                $newMessage->event_id = $id;
                $newMessage->title = $request->input('title');
                $newMessage->message = $request->input('message');
                $newMessage->save();
                return redirect()->back()->with('success', 'Message sent successfully');
            } else {
                return redirect('/user/home')->with('error', 'There is no such event');
            }
        }
    }

    /*
    * Handles deleting a message of an event
    */
    public function do_delete_message(Request $request, $id) {
        $message = Message::find($id);
        if(count($message) == 1) {
            $message->delete();
            return redirect()->back()->with('success', 'Messaged deleted successfully');
        } else {
            return redirect()->back('/user/home')->with('error', 'There is no such message');
        }
    }
}
