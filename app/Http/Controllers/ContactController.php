<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();

        $setting = Setting::select('contact_mail')->first();
        $contact_email = $setting ? $setting->contact_mail : 'wsmajlksna@gmail.com';

        Mail::to($contact_email)->send(new ContactMail(
            $validated['name'],
            $validated['email'],
            $validated['subject_mail'],
            $validated['content']
        ));

        return to_route('home')->with('message', 'Message sent sucessfully !');
    }
}
