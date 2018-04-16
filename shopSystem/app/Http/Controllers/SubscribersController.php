<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscribersRequest;
use App\Subscribers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubscribersController extends Controller
{
    public function index(CreateSubscribersRequest $request)
    {

        $subscriber = Subscribers::create([
            'email'  => $request->email,
            'source' => $request->footer,

        ]);
        return redirect(route('home'));

    }
}
