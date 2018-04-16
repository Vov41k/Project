<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {

        $cartcontent = Cart::content();
        $total       = Cart::subtotal();
        $count       = Cart::count();
        
//        dd(get_class_methods('Gloudemans\Shoppingcart\Cart'));

        return view('cart.index', compact('cartcontent', 'count', 'total'));

    }

    public function addToCart(Request $request, $id)
    {

        $product = Product::find($id);
        $options = ($request->except('_token'));
//         dd($options);

        $name      = $product->title;
        $price     = $product->price;
        $arrayCart = [];

        $arrayCart['image'] = $product->image;

        foreach ($options as $key => $value) {
            $arrayCart[$key] = $value;
        }

        Cart::add($id, $name, 1, $price, $arrayCart

        );
        

        $total = Cart::subtotal();

        $categories = Category::orderBy('sort_order', 'asc')->get();
        $count      = Cart::count();

        $cartcontent = Cart::content();


        return redirect(route('cart'));
//         return view('cart.index', compact('categories', 'cartcontent', 'count', 'total'));

    }

    public function remove($id)
    {
    
        $cart = Cart::content();
        $qty  = $cart->where('rowId', $id)->first()->qty;
        $qty--;
        Cart::update($id, $qty);
     
        return redirect(route('cart'));
    }

    public function deletecart()
    {
        Cart::destroy();
        return redirect(route('home'));

    }

    public function addQuantity(Request $request, $id)
    {
        $cart = Cart::content();
        $qty  = $cart->where('rowId', $id)->first()->qty;
        $qty++;

        Cart::update($id, $qty);

        return [
            'total'       => Cart::total(),
            'qty'         => $qty,
            'cartcontent' => Cart::content(),
            'subtotal'    => Cart::subtotal(),
            'count'       => Cart::count(),
        ];

 

    }

    public function reduceQuantity(Request $request, $id)
    {

 
        $item = Cart::get($id);

        Cart::update($id, --$item->qty);

     

        return [
            'total'       => Cart::total(),
            'qty'         => $item->qty,
            'cartcontent' => Cart::content(),
            'subtotal'    => Cart::subtotal(),
            'count'       => Cart::count(),
        ];
  

    }
}
