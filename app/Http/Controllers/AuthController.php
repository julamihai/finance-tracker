<?php

namespace App\Http\Controllers;

use Faker\Core\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function account()
    {
        return view('./auth/account');
    }

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
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withErrors('password_confirmation', 'The password confirmation does not match!');
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'uuid' => Str::uuid()->toString(),
        ]);
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email or password did not work! Try again!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function accountDelete()
    {
        $user = Auth::user();
        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Your account has been deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to delete account.');
        }
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $validatedData = $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect()->route('account')->with('success', 'Password changed successfully!');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function changeUsername()
    {
        return view('auth.editUsername');
    }

    public function newUsername(Request $request)
    {
        $request->validate([
            'new_username' => 'required|string|max:255'
        ]);

        $user = $request->user();
        $user->name = $request->new_username;
        $user->save();

        return redirect()->route('account')->with('success', 'Your username has been updated successfully!');
    }

    public function changeEmail()
    {
        return view('auth.editEmail');
    }

    public function newEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        $user = $request->user();
        $user->email = $request->email;
        $user->save();

        return redirect()->route('account')->with('success', 'Email updated successfully!');
    }
}
