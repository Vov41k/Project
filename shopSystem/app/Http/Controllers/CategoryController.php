<?php

namespace App\Http\Controllers;

use App\BundleOptions;
use App\Category;
use App\Options;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index($id)
    {
        $arrFilter = [];
   
        $options = Options::all();

        $products = Product::where('category_id', '=', $id)->where('active', '=', '1')->get();
       

        $bundle = BundleOptions::all();
        $price  = [];
      
        foreach ($products as $prod) {
            $price[] = $prod->price;
            foreach ($prod->bundle as $bundl) {
                foreach ($bundl->option as $opt) {

                  
                    $arrFilter[$opt->type][$opt->value] = $opt->id;
                }
            }
        }
        if(empty($price)){
            $price[]=0;
        }
  
        $minPrice = min($price);
        $maxPrice = max($price);
        $showProducts = Product::where('category_id', '=', $id)->where('active', '=', '1')->paginate(6);
        $showBestProducts = Product::where('category_id', '=', $id)->where('active', '=', '1')->orderBy('price', 'desc')->paginate(3);
        $categories = Category::orderBy('sort_order', 'asc')->get();
        $count      = Cart::count();
        return view('category.index', compact('categories', 'showProducts', 'showBestProducts', 'count', 'arrFilter', 'id', 'minPrice', 'maxPrice'));
    }

}
