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


class FilterController extends Controller
{
       public function filter(Request $request, $id)
    {
      
        $filter = $request->except(['_token', 'min_price', 'max_price']);

        if ($filter == null) {

          
            $categories       = Category::orderBy('sort_order', 'asc')->get();
            $count            = Cart::count();
            $minPrice         = implode($request->min_price);
            $maxPrice         = implode($request->max_price);
            $showProducts     = Product::where('price', '>=', $minPrice)->where('price', "<=", $maxPrice)->where('active', '=', 1)->where('category_id', '=', $id)->paginate(20);
            $arrFilter        = [];
            $products = Product::where('category_id', '=', $id)->where('active', '=', '1')->get();
   

       
       
        foreach ($products as $prod) {
            $price[] = $prod->price;
            foreach ($prod->bundle as $bundl) {
                foreach ($bundl->option as $opt) {

                  
                    $arrFilter[$opt->type][$opt->value] = $opt->id;
                }
            }
        }
            $filterValue      = [];
            $showBestProducts = Product::where('category_id', '=', $id)->where('active', '=', '1')->orderBy('price', 'desc')->paginate(3);

            return view('filter.index', compact('categories', 'showProducts', 'showBestProducts', 'count', 'arrFilter', 'id', 'minPrice', 'maxPrice', 'filterValue'));

        }
        $minPrice = implode($request->min_price);
        $maxPrice = implode($request->max_price);

  
        $filter2 = [];
  
        $filterValue = [];
        foreach ($filter as $key => $value) {
         
            foreach ($value as $key2 => $val) {
                $filterValue[] = $val;

          
                $filter2[$key][] = $val;
         

            }

        }

        $query2 = "";
        $array  = [];



        foreach ($filter2 as $key) {
            foreach ($key as $value) {

                $array[] = $value;
            }

        }



     

            $findAllOptions = BundleOptions::whereHas('products', function ($q) use ($minPrice, $maxPrice, $id) {
                $q->where('price', '>=', $minPrice)->where('price', "<=", $maxPrice)->where('active', '=', 1)->where('category_id', '=', $id);
            })->whereHas('option', function ($q2) use ($array) {

                $q2->whereIn('value', $array);

            })->pluck('product_id');


            foreach ($filter2 as $key) {
                foreach ($key as $key2 => $value) {
  
                    $findNeededOptions = BundleOptions::whereIn('product_id', $findAllOptions)->whereHas('option', function ($q2) use ($value) {

                        $q2->where('value', '=', $value);

                    })->pluck('product_id');
   
                }

                $findAllOptions = $findNeededOptions;
            }
   
     

        $showProducts = Product::whereIn('id', $findNeededOptions)->paginate(20);
         
       
        $showBestProducts = Product::where('category_id', '=', $id)->where('active', '=', '1')->orderBy('price', 'desc')->paginate(3);

        $categories = Category::orderBy('sort_order', 'asc')->get();
        $count      = Cart::count();
        $arrFilter  = [];
 
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

        return view('filter.index', compact('categories', 'showProducts', 'showBestProducts', 'count', 'arrFilter', 'id', 'minPrice', 'maxPrice', 'filterValue'));

       
    }
}
