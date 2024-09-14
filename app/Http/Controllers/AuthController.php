<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function registerUser(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $formFields = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        $user = User::create($formFields);

        if ($user) {
            $user->notify(new VerifyEmailNotification($user));
            auth()->login($user);
            return redirect('/verify-email-page')->with('success', 'User has been registered successfully. Please verify your email.');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    public function loginuser(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=> 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return redirect()->back()->with('error', 'Credentials did not match our records');
        }

        $remember = $request->has('remember');
        auth()->login($user, $remember);

        return redirect('/home')->with('success', 'Login successful');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home')->with('success', 'Logout Successfully');
    }

    public function verify($id, Request $request) {
        if (!$request->hasValidSignature()) {
            return abort(404);
        }

        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return redirect('/home')->with('success', 'Email verified successfully');
        } else {
            return redirect('/')->with('error', 'Email already verified');
        }
    }
}
