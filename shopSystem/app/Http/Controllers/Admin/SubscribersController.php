<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribers;

class SubscribersController extends Controller
{
    public function index(){
        $subscribers=Subscribers::all();
       return view('admin.subscribers.index',compact('subscribers'));
    }
    public function delete($id){
          $subscriber=Subscribers::find($id);
          $subscribers=Subscribers::all();
          $subscriber->delete();
        return redirect()->route('admin.showsubscribers');
          
    }
}
