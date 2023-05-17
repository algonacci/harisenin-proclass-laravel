<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
// use Mail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function show()
    {
        return view("layout.contact.contact");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|digits:12|numeric",
            "subject" => "required",
            "message" => "required",
            "file" => "required|mimes:jpeg,png,jpg|max:2048",
        ]);

        if ($request->file('file')->isValid()) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
        } else {
            dd('error');
        }
        $input = $request->all();
        Mail::to($input["email"])->send(new ContactMail($input));
        return redirect()->back()->with(["success" => "Thank you for contact us"]);
    }
}
