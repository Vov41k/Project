<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactUsRequest;
use App\Mail\ContactUs;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $count = Cart::count();
        return view('contact.index', compact('count'));
    }
    public function send(CreateContactUsRequest $request)
    {
        $name        = $request->name;
        $email       = $request->email;
        $subject     = $request->subject;
        $bodymessage = $request->bodymessage;

        Mail::send(new ContactUs($name, $email, $subject, $bodymessage));

        return redirect()->route('home');
    }
    
}
