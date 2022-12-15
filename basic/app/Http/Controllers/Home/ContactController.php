<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Contact() {

        return view('frontend.contact');


    }

    public function StoreMessage(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',

        ],[

            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'subject.required' => 'Subject is Required',
            'phone.required' => 'Phone Number is Required',
            'message.required' => 'Message is Required'

        ]);

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Your Message Submited Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function ContactMessage() {

        $contacts = Contact::latest()->get();
        return view('admin.contact.allContact', compact('contacts'));

    }

    public function DeleteMessage($id) {

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Message Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



}
