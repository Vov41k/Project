<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegistrationUserRequest;
use App\Order;
use App\Product;
use App\ProductsOrder;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{

    public function createOrder(CreateRegistrationUserRequest $request)
  
    {

        if (Auth::check()) {
            $id = Auth::id();

        } else {
            $userEmail = $request->email;

            $user = User::where('email', '=', $userEmail)->first();

            if ($user === null) {
                $newUser = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => bcrypt(1111),

                ]);

                $id = $newUser->id;

            } else {
                $user == $user;
                $id = $user->id;

            }

        }

        $cartcontent = Cart::content();
        $total       = Cart::subtotal();
        $count       = Cart::count();

        
        
        $orderCreate = Order::create([
            'user_id' => $id,

        ]);
        $userId = $orderCreate->id;

        foreach ($cartcontent as $item) {
            $choisenOptions="";

            foreach($item->options as $key=>$opt){

                if($key!="image"){

                      $choisenOptions.=$key."=>".$opt." ";
                    

                }
             

            }

         
            $productOrder = ProductsOrder::create([
                'order_id'   => $userId,
                'product_id' => $item->id,
                'choisen_options'=>$choisenOptions,
                'quantity'   => $item->qty,

            ]);

        }

        return view('successpage.index', compact('count', 'total', 'cartcontent'));

    }
}
