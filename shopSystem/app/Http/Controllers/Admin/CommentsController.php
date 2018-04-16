<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comments;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.comments.index', compact('products'));

    }

    public function activate(Request $request, $id)
    {
        $comments = Comments::find($id);

        if ($comments->active == 1) {
            $comments->active = 0;
            $comments->save();
            return $comments->active;
        } else {
            $comments->active = 1;
            $comments->save();
            return $comments->active;
        }
    }



/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {

        // return view('admin.comments.create');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {

        $idUser = Auth::user()->id;
         if(request('rating-input-1')==null){
        $vote=5;
            }else {
        $vote=request('rating-input-1');
         }
         if(request('body')==null){
            $msg="no msg";
         } else {
            $msg=request('body');
         }

        if (Auth::user()->name == 'admin') {
            Comments::create([
                'user_id'    => $idUser,
                'product_id' => $request->product_id,
                'body'       => $msg,
                'vote'       => $vote,
                'active'     => 1,

            ]);
        } else {
            Comments::create([
                'user_id'    => $idUser,
                'product_id' => $request->product_id,
                'body'       => $msg,
                'vote'       => $vote,

            ]);
        }

        return redirect()->route('admin.comments.index')
            ->with('success', 'News created successfully');
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $comments = Comments::where('product_id', '=', $id)->get();
        // $all      = Comments::all();

        $vote = Comments::where('product_id', '=', $id);
        // $productid = $id;
        return view('admin.comments.show', compact('comments', 'vote', 'id'));
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        //
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {
        //
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        $comments = Comments::find($id);
        $comments->delete();
        
//        return redirect()->route('admin.comments.index');
         return back();
    }
}
