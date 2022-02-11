<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('admin.feedback', compact('contacts'));
    }

    public function create()
    {
        return view('contacts');
    }

    public function store()
    {
        $contact = new Contact();

        $this->validate(request(), [
            'email' => 'required|min:10|max:55',
            'message' => 'required|min:3|max:255',
        ]);

        $contact->email = request('email');
        $contact->message = request('message');

        $contact->save();

        return redirect(route('feedback'));
    }
}
