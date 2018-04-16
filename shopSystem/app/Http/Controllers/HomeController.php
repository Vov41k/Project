<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
         

            return view('admin.dashboard');
        } else {
            Session::flash('success', 'Приємних покупок, ' . Auth::user()->name);

            /**
             * route view home can be use for room of user
             */
            // return view('home');
            return redirect('/');
        }
    }

}
