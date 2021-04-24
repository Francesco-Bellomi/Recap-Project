<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {

        $user = $request->user;
        $message = $request->message;
        $email = $request->email;
        $contact = compact('user', 'message');


        Mail::to($email)->send(new ContactMail($contact));

        return redirect(route('homepage'))->with('message', 'La tua richiesta è stata effettuata');
    }
}
