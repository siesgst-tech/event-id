<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use App\Message;
use App\Entries;
use Response;
use Validator;
use Hash;
use JWTAuth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    /*
    * Handles sending response with headers if present
    */
    public function send_response($status, $message, $token = NULL) {
        if($token) {
            return Response::json(
                $data = array('status' => $status, 'message' => $message),
                $status = 200,
                $headers = ['Content-Type' => 'application/json', 'Authorization' => 'Bearer '.$token],
                $options = JSON_PRETTY_PRINT);
        } else {
            return Response::json(
                $data = array('status' => $status, 'message' => $message),
                $status = 200,
                $headers = ['Content-Type' => 'application/json'    ],
                $options = JSON_PRETTY_PRINT);
        }
    }

    /* AUTH */
    /*
    * Handles login
    */
    public function login(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required | email | max:64',
            'password' => 'required ',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            // Check if user exists
            $checkUser = User::where('email', $request->input('email'))->first();
            if($checkUser) {
                if (Hash::check($request->input('password'), $checkUser->password)) {
                    // Create a token
                    try {
                        if (! $token = JWTAuth::fromUser($checkUser)) {
                            return $this->send_response('fail', 'Incorrect details');
                        }
                    } catch (JWTException $e) {
                        return $this->send_response('fail', 'Cannot create token');
                    }
                    return $this->send_response('success', $checkUser, $token);
                } else {
                    return $this->send_response('fail', 'Incorrect Password');
                }
            } else {
                return $this->send_response('fail', 'Incorrect email address');
            }
        }
    }

    /* USER SETTINGS */
    /*
    * Handles profile updation
    */
    public function update_profile(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'prn' => 'required | min:8 | max:8',
            'year' => 'required',
            'branch' => 'required',
            'email' => 'required | email',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            // Check if user exists
            $user = User::where('email', $request->input('email'))->first();
            if($user) {
                // Update profile attributes
                $user->prn = $request->input('prn');
                $user->branch = $request->input('branch');
                $user->year = $request->input('year');
                $user->save();
                return $this->send_response('success', 'Profile updated successfully');
            } else {
                return $this->send_response('fail', 'Incorrect email address');
            }
        }
    }

    /*
    * Handles password change
    */
    public function update_password(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'email' => 'required | email',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            $user = User::where('email', $request->input('email'))->first();
            // Check Password too
            if(Hash::check($request->input('old_password'), $user->password)) {
                // Hash new password
                $new_password = Hash::make($request->input('new_password'));
                $user->password = $new_password;
                $user->save();
                return $this->send_response('success', 'Password changed successfully');
            } else {
                 return $this->send_response('fail', 'Incorrect email address');
            }
        }
    }

    /* USER ACTIVITY */
    /*
    * Handles showing all entries
    */
    public function my_entries(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            $entries = DB::table('entries')
                       ->join('events', 'entries.event_id', 'events.id')
                       ->select('events.name', 'entries.*')
                       ->where('user_id', $request->input('user_id'))->get();
            return $this->send_response('success', $entries);
        }
    }

    /*
    * Handles showing all event entries
    */
    public function event_entries(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            $entries = DB::table('entries')
                        ->join('users', 'entries.id', 'users.id')
                        ->join('events', 'entries.event_id', 'events.id')
                        ->select('users.name', 'entries.*')
                        ->get();
            return $this->send_response('success', $entries);
        }
    }

    /*
    * Handles showing all event messages
    */
    public function my_messages(Request $request) {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        // If validator fails
        if($validator->fails()){
            return $this->send_response('fail', 'Some errors in your form');
        } else {
            $messages = DB::table('entries')
                        ->join('messages', 'entries.event_id', 'messages.event_id')
                        ->join('users', 'entries.id', 'users.id')
                        ->join('events', 'entries.event_id', 'events.id')
                        ->select('events.name', 'messages.*')->get();
            return $this->send_response('success', $messages);
        }
    }
}
