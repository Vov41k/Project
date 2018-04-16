<?php

namespace App\Http\Controllers;

use App\BundleOptions;
use App\Category;
use App\Comments;
use App\Images;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index($id)
    {
//          $product = Product::whereId($id)->whereActive(1)->firstorFail();
//        dd($product);
        $product = Product::where(['id' => $id, 'active' => 1])->firstOrFail();

        $bundle = BundleOptions::where('product_id', '=', $id)->get();

        // dd($bundle[0]->option[0]->type);
        // dd($r);

        /**
         * [$categories description]
         * $categories needs for nav menu;
         * @var [type]
         */
        $categories = Category::orderBy('sort_order', 'asc')->get();

        /**
         * [$productsSession description]
         * this variable need to know what products were seen by client,first take previous date from session
         * @var [type]
         */
        // session()->forget('some_data');
        // session()->flush();
        $productsSession = session('visited');

        /**
         * [$arraysession description]
         *create array of id products
         * @var [type]
         */
        $arraysession = session()->push('visited', $id);
        /**
         * [$productsSession description]
         * this variable need for know what products were seen by client, take all date from session
         * @var [type]
         */
        $productsSession = session('visited');
        // dd($productsSession);

        /**
         * finding id of selected products
         * @var [type]
         */

        /**
         * finding id of selected category
         */

        $idCategory = $product->category_id;

        /**
         * [$productsOrder description]
         * selecting last products with price asc
         * @var [type]
         */
        // $productsBest = Product::where('category_id', '=', $idCategory)->orderBy('price', 'asc')->paginate(3);
        $productsBest = Product::where('category_id', '=', $idCategory)->where('active', '=', 1)->orderBy('price', 'asc')->take(3)->get();

        /**
         * $productsOrderAll ->this is data of visiting products of person
         * @var [type]
         */
    
    
        $productsVisited = Product::whereIn('id', $productsSession)
            ->where('active', '=', 1)
            ->orderBy('price', 'desc')
            ->take(3)->get();
        // dd($productsVisited);
        $count                 = Cart::count();
        $comments              = Comments::all();
        $commentsProduct       = Comments::where('product_id', '=', $id)->where('active', '=', 1)->paginate(20);
        $commentsProductReview = Comments::where('product_id', '=', $id)->get();
        $countComments         = count($commentsProductReview);
        $avgvote               = Comments::where('product_id', '=', $id)->avg('vote');
        $avgvote               = floor($avgvote);
    

        $arrOptionValue = [];
        foreach ($bundle as $bundl) {
          
            foreach ($bundl->option as $key) {
             
                $arrOptionValue[$key->type][$key->id] = $key->value;
            }

        }



        return view('product.showproduct', compact('categories', 'product', 'productsBest', 'productsVisited', 'count', 'comments', 'commentsProduct', 'countComments', 'avgvote', 'bundle', 'arrOptionValue'));
    }
}
