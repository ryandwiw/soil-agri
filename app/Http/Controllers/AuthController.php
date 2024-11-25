<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.login');
    }

    public function registerForm(){
        return view('admin.register');
    }

    public function authLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $credentials = [
            'password' => $request->input('password')
        ];
    
        // Check if the input is an email, then use email as the login field
        if (filter_var($request->input('name'), FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->input('name');
        } else {
            $credentials['name'] = $request->input('name');
        }
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
    
        return back()->withErrors(['name' => 'Invalid credentials']);
    }

    public function authRegister(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect('register')
            ->withErrors($validator)
            ->withInput();
    }

    // Create a new user
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    // Log in the registered user if you want
    // Auth::login($user);

    return redirect('/login')->with('success', 'Registration successful. Please log in.');
}

public function logout()
{
    Auth::logout();

    return redirect('/');
}
}
