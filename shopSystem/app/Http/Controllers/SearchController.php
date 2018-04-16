<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $value = $request->search;
        $count = Cart::count();

        $categories = Category::orderBy('sort_order', 'asc')->get();

        $searchingitems = Product::where('title', 'like', '%' . $value . '%')->get();
    

        return view('product.showsearching', compact('searchingitems', 'categories', 'value', 'count'));

    }
}
