<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view("welcome");
    }

    public function sayMyName()
    {
        $name = "Eric Julianto";
        return view("pages.say-my-name", ["name" => $name]);
    }
}
