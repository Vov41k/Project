<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Order;
use App\Product;
use App\ProductsOrder;
use App\User;
use App\BundleOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index()
    {

        $user = User::all();
     
        $productsOrder = ProductsOrder::all();
   
        return view('admin.orders.index', compact('productsOrder'));

       
    }
    public function create(){
        return view('admin.orders.create');
    }
    public function delete($id){
         $count=0;
         $productOrder=ProductsOrder::find($id);
         $order_id=$productOrder->order_id;
         $orderDelete=ProductsOrder::where('order_id','=',$order_id)->get();

        foreach($orderDelete as $key=>$value){
            $count++; 
        }
        $productOrder->delete();

     
        if($count==1){
           

            
            $order=Order::where('id','=', $order_id);

            $order->delete();
        }

        
        

         $productsOrder = ProductsOrder::all();
         return view('admin.orders.index', compact('productsOrder'));
        
        
        
  
    
        
    }
    public function edit($id){
        $productOrder=ProductsOrder::find($id);
        $product_id=$productOrder->product_id;
        $arrOptionvalue=[];
        $bundle=BundleOptions::where('product_id','=',$product_id)->get();
        foreach($bundle as $bundl){
            
        
             foreach ($bundl->option as $opt) {

         
                    $arrOptionValue[$opt->type][$opt->id] = $opt->value;
                }
            }

       
        
        return view('admin.orders.edit',compact('productOrder','product','arrOptionValue'));
    }
    public function update(Request $request,$id){
        
         $productOrder = ProductsOrder::find($id);
         $options = ($request->except('_token','_method','qty'));
         $choisenOptions="";
             
            

            foreach($options as $key=>$opt){

             $choisenOptions.=$key."=>".$opt." ";
               

            }

        $productOrder->choisen_options = $choisenOptions;
        $productOrder->quantity       = $request->qty;
        $productOrder->save();
    return redirect()->route('admin.orders');
        
            
            
    
       
    }
}
