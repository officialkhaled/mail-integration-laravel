<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\Mail\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function create()
    {
        return view('mails.create');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ], [
            'title.required' => 'Please enter your Title',
            'subject.required' => 'Please enter your Subject',
            'body.required' => 'Please enter your Message',
        ]);

        $mailData = [
            'title' => $request->input('title'),
//            'to_mail' => Auth::user()->email,
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
            'view' => 'mails.mail-template',
        ];

        Mail::to('khaled@skylarksoft.com')->send(new MailService($mailData));

        return redirect()->route('dashboard')->with([
            'status' => 'success',
            'message' => 'Email Sent Successfully!'
        ]);

    }
}
