<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Notifications\ContactMessageSent;
use App\Notifications\ContactMessageVerified;
use Notification;

class ContactController extends Controller
{
    public function storeContact(Request $request)
    {
    	//Validate first
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'message' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#contactus')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $contact = new Contact;
        $contact->name = strip_tags($request->name);
        $contact->email = strip_tags($request->email);
        $contact->phone = strip_tags($request->phone);
        $contact->message = nl2br(strip_tags($request->message));

        $contact->save();

        //Send email to the owner
        Notification::route('mail', env("CONTACT_MAIL"))
            ->notify(new ContactMessageSent($contact));

        //Send email to the contact
        $contact->notify(new ContactMessageVerified($contact));

        return redirect()->to(url()->previous() . '#contactus')->withStatus(__('Thank you for contacting us. We will review your message and contact you shortly!'));
    }
}
