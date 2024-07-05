<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        Mail::to('your@email.com')->send(new ContactMail($validatedData));

        return response()->json(['message' => 'Email sent successfully']);
    }
    public function index()
    {
        $data = [
            'user_name' => 'John Doe',
            'user_email' => 'john@example.com',
            'message' => 'This is a test message',
        ];
    
        return view('contact.index', compact('data'));
    }
    
}
