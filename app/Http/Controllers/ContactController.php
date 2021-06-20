<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\OrderShipped;

use App\Http\Requests;

use App\Http\Requests\ContactFormRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendemail()
    {
        $data = ['name' => "DimaSkup", 'email' => "DimaSkupejko@gmail.com"];
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Test Subject');
        });
        flash('Email was sent!');
    }

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
        //Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));
        Mail::to("DimaSkupejko@gmail.com")->send(new ContactEmail($contact));

        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');
    }


    public function ship(Request $request)
    {
        //$when = now()->addMinutes(10);

        // Ship order
        //Mail::to("DimaSkupejko@gmail.com")->later($when, new OrderShipped());
        //return (new OrderShipped())->render();
        Mail::to("kokos@gmail.com")->send(new OrderShipped());

        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');
    }
}
