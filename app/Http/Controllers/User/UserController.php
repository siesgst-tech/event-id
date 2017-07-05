<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Shows home
    public function show_home(Request $request) {
        $session = Session::get('session');
        return view('pages.user.home')->with('session', $session);
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

    /*
    * Handles updating profile information
    */
    public function do_general_settings(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'prn' => 'required | min:8 | max:8',
            'branch' => 'required',
            'year' => 'required',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            $user = User::where('email', Session::get('session')->email)->first();
            // Update profile attributes
            $user->prn = $request->input('prn');
            $user->branch = $request->input('branch');
            $user->year = $request->input('year');
            $user->save();
            Session::regenerate();
            Session::put('session', $user);
            return redirect()->back()->with('success', 'Profile updated successfully');
        }
    }

    /*
    * Handles updating password
    */
    public function do_security_settings(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            $user = User::where('email', Session::get('session')->email)->first();
            // Check Password too
            if( (Hash::check($request->input('old_password'), Session::get('session')->password))
                && (Hash::check($request->input('old_password'), $user->password)) ) {
                // Hash new password
                $new_password = Hash::make($request->input('new_password'));
                $user->password = $new_password;
                $user->save();
                Session::regenerate();
                Session::put('session', $user);
                return redirect()->back()->with('success', 'Password changed successfully');
            } else {
                 return redirect()->back()->with('error', 'Incorrect Old Password');
            }
        }
    }
}
