<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {

        Mail::send('emails.request', function ($message) {
            $message->from($request['email'], $request['nom']+'-'$request['sujet']);

            $message->to('liyokuna@yahoo.fr')->subject($request['corps']);
        });
		return view('emails.request')
        ->withSuccess("Message envoyé !");
    }
}
