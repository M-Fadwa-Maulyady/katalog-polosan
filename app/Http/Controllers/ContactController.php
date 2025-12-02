<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Kirim email
        Mail::to('ubelajar44@gmail.com')->send(new ContactMail(
            $request->name,
            $request->email,
            $request->message
        ));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
