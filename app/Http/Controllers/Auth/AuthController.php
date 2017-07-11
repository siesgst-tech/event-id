<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

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
    public function show_reset(Request $request, $reset_code) {
        $checkUser = DB::table('forgot_password')->where('reset_code', $reset_code)->where('status', 1)->first();
        if($checkUser) {
            return view('auth.reset');
        } else {
            return redirect('/auth/login')->with('error', 'Incorrect reset code');
        }
    }

    /*
    * Handles registration of new user
    * TODO: add email verification
    */
    public function do_register(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required | max:64',
            'email' => 'required | email | max:64',
            'password' => 'required ',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return response()->json([
                    'status' => 'fail',
                    'message' => 'There are some errors in your Form !',
                ]);
        } else {
            // Check if user exists
            $checkUser = User::where('email', $request->input('email'))->get();
            if(count($checkUser) == 1) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'User with that email id already exists!',
                ]);
            } else {
                // Register that user
                $password = Hash::make($request->input('password'));
                $newUser = User::firstOrCreate(
                    ['email' => $request->input('email'), 'name' => $request->input('name'), 'password' => $password]
                );
                if($newUser) {
                    return response()->json([
                    'status' => 'success',
                    'message' => 'Registration Successful ! Confirmation link has been sent to Email !',
                ]);
                } else {
                    return response()->json([
                    'status' => 'fail',
                    'message' => 'Something went wrong !',
                ]);
                }
            }
        }
    }

    /*
    * Handles login of user
    */
    public function do_login(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required | email | max:64',
            'password' => 'required ',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => 'There are some errors in your form !',
            ]);
        } else {
            // Check if user exists
            $checkUser = User::where('email', $request->input('email'))->first();
            if($checkUser) {
                if (Hash::check($request->input('password'), $checkUser->password)) {
                    Session::regenerate();
                    Session::put('session', $checkUser);
                    if($checkUser->role == 'admin') {
                        return response()->json([
                        'status' => 'success',
                        'message' => 'admin',
                    ]);
                    } else if($checkUser->role == 'eventhead') {
                        return response()->json([
                        'status' => 'success',
                        'message' => 'eventhead',
                    ]);
                    } else if($checkUser->role == 'user') {
                        return response()->json([
                        'status' => 'success',
                        'message' => 'user',
                    ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Incorrect Password !',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'There is no such User !',
                ]);
            }
        }
    }

    /*
    * Handles forgot password of user
    * TODO: send email
    */
    public function do_forgot(Request $request) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required | email | max:64',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return response()->json([
                        'status' => 'fail',
                        'message' => 'Some Errors in your Form !',
                    ]);
        } else {
            // Check if user exists
            $checkUser = User::where('email', $request->input('email'))->get();
            if(count($checkUser) == 1) {
                // Find if there is a reset_code already unused
                $checkForgotUser = DB::table('forgot_password')->where('email', $request->input('email'))->where('status', 1)->first();
                if($checkForgotUser) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Password reset Email has been sent successfully !',
                    ]);
                } else {
                    // Generate a reset_code
                    $reset_code = "EID-".strtoupper(substr(md5(base64_encode(openssl_random_pseudo_bytes(32))), 0, 4));
                    // Insert entry into database
                    $newForgotUser = DB::table('forgot_password')->insert(
                        ['email' => $request->input('email'), 'reset_code' => $reset_code, 'status' => 1]
                    );
                    if($newForgotUser) {
                        return response()->json([
                        'status' => 'success',
                        'message' => 'Password reset Email has been sent successfully !',
                    ]);
                    } else {
                        return response()->json([
                        'status' => 'fail',
                        'message' => 'Some Error Try Again !',
                    ]);
                    }
                }
            } else {
                return response()->json([
                        'status' => 'fail',
                        'message' => 'There is No Such User !',
                    ]);
            }
        }
    }

    /*
    * Handles reset password of user
    * TODO: add session
    */
    public function do_reset(Request $request, $reset_code) {
        // Validate the input
        $messages = [
            'required' => 'Enter your :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
        ], $messages);
        // If validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Some errors in your form')->withErrors($validator)->withInput();
        } else {
            // Check if user exists
            $checkUser = DB::table('forgot_password')->where('reset_code', $reset_code)->where('status', 1)->first();
            if($checkUser) {
                // Hash new password
                $password = Hash::make($request->input('new_password'));
                $updateUser = User::where('email', $checkUser->email)->update(['password' => $password]);
                if($updateUser) {
                    $updateStatus = DB::table('forgot_password')->where('reset_code', $reset_code)->update(['status' => '0']);
                    return redirect('/auth/login')->with('success', 'Password reset was successful. Try Login');
                } else {
                    return redirect()->back()->with('error', 'Some error. Try again')->withInput();
                }
            } else {
                return redirect('/auth/login')->with('error', 'Incorrect reset code');
            }
        }
    }

    /*
    * Handles logout
    */
    public function do_logout(Request $request) {
        Session::flush();
        return redirect('/auth/login')->with('success', 'See you soon');
    }
}
