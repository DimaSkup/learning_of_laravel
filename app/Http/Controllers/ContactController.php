<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactFormRequest $request)
    {
        $contact = [];

        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');


        // Mail delivery logic goes here
        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');
    }
}
