<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Images;
use App\Product;
use Illuminate\Http\Request;

class ImagesSliderController extends Controller
{
    public function add(Request $request, $id)
    {
        $productId = $id;

        $imagesSlider = $request->imageSlider;
        foreach ($imagesSlider as $imageSlider) {

            $imageSliderNewName = time() . $imageSlider->getClientOriginalName();

            $imageSlider->move('uploads/product/', $imageSliderNewName);

            Images::create([
                'products_id' => $productId,
                'url'         => 'uploads/product/' . $imageSliderNewName,

            ]);
        }
        return redirect()->route('admin.product.index');
    }

    public function changeimageslider($id)
    {
        $images  = Images::where('products_id', '=', $id)->get();
        $product = Product::find($id);

        return view('admin.imagesslider.index', compact('images', 'product'));
    }

    public function deleteimageslider($id, $idim)
    {
        $images = Images::find($idim);
        $images->delete();
        return back();
    }

    public function changeoneimage(Request $request, $id, $idim)
    {

        $image = $request->image;

        $imageNewName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/', $imageNewName);

        $image      = Images::find($idim);
        $image->url = 'uploads/product/' . $imageNewName;
        $image->save();
        return redirect()->route('admin.product.index');

    }

}
