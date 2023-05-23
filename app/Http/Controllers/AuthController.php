<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login", [
            "title" => "Login"
        ]);
    }

    public function register()
    {
        return view("auth.register", [
            "title" => "Register"
        ]);
    }

    public function store()
    {
        $validatedData = request()->validate([
            "name" => "required|max:25",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:8|max:255|confirmed",
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::create($validatedData);

        return redirect("/login");
    }

    public function authenticate()
    {
        $credentials = request()->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended("/dashboard");
        }

        return back()->with("logginError", "Login Error!");
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/login");
    }
}
