<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class AuthController extends Controller
{
    public function getlogin()
    {
        return view('login.index');
    }
    public function getregister()
    {
        return view('register.index');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);


        // Optionally, you can automatically login the user after registration
        auth()->login($user);

        // Redirect the user after successful registration
        return redirect()->route('dashboard')->with('succes', 'Login succesfull!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Credențialele de autentificare nu sunt valide.']);
    }

    public function logout(){
        Auth::logout();
    }
}
