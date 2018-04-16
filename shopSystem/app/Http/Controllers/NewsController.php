<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        $count = Cart::count();
        return view('news.index', compact('news', 'count'));

    }

    public function show($id)
    {
        $news  = News::find($id);
        $count = Cart::count();
        return view('news.show', compact('news', 'count'));
    }
}
