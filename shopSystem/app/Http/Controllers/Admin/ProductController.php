<?php

namespace App\Http\Controllers\Admin;

use App\BundleOptions;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProductFormRequest;
use App\Images;
use App\Options;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class ProductController extends Controller
{
    public function index()
    {
       
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();

        return view('admin.product.create', compact("category"));

    }

    public function activate(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if ($product->active == 1) {
            $product->active = 0;
            $product->save();

            return $product->active;
        } else {
            $product->active = 1;
            $product->save();

            return $product->active;
        }

    }

    public function store(ProductFormRequest $request)
    {

      
        $count     = 0;
        $arrOption = [];
        $arr2=[];
        $option    = $request->except(['_token', 'title', 'description', 'category_id', 'price', 'image', 'imageSlider']);
        $image        = $request->image;
        $imageNewName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/', $imageNewName);
        $product = Product::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => 'uploads/product/' . $imageNewName,
            'category_id' => $request->category_id,
            'price'       => $request->price,
        ]);

        if ($request->hasFile('imageSlider')) {

            $imagesSlider = $request->imageSlider;
            foreach ($imagesSlider as $imageSlider) {

                $imageSliderNewName = time() . $imageSlider->getClientOriginalName();

                $imageSlider->move('uploads/product/', $imageSliderNewName);

                Images::create([
                    'products_id' => $product->id,
                    'url'         => 'uploads/product/' . $imageSliderNewName,

                ]);
            }

        }
        
        
        
        $arrnew=[];
            foreach($option as $key=>$value){
                    if (strpos($key, "type") !== false) {

                    
            $count++;
            $qty = $option['qty' . $count];
             
               if ($request->has('imageOption' . $count)) {
                    $im = $option["imageOption" . $count];

                } else {
                    $im = "noImage";
                }

                $arrnew[$key][$value][next($option)][$qty] = $im;
                   next($option);
                next($option);
           
            }
            
        }

        if($arrnew){
            foreach($arrnew as $key=>$value){
                foreach($value as $key2=>$value2){
                    foreach($value2 as $key3=>$value3){
                        
                            $options = Options::create([
//
                        'type'  => $key2,
                        'value' => $key3,

                    ]);
                                      foreach ($value3 as $key4 => $value4) {
                                      
                        if ($value4 != 'noImage') {
                            $image        = $value4;
                            $imageNewName = time() . $image->getClientOriginalName();
                            $image->move('uploads/product/', $imageNewName);
                            $bundle = BundleOptions::create([
                                'product_id' => $product->id,
                                'options_id' => $options->id,
                                'qty'        => $key4,
                                'image'      => 'uploads/product/' . $imageNewName,

                            ]);
                        } else {
                            $bundle = BundleOptions::create([
                                'product_id' => $product->id,
                                'options_id' => $options->id,
                                'qty'        => $key4,

                            ]);
                        }

                  
                    }
                    }
                }
            }
        }

        Session::flash('Success', 'Пост збережений');
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));

        return redirect('admin/product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit')->with('product', $product)->with('category', Category::all());
    }

    public function update(ProductFormRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $image        = $request->image;
            $imageNewName = time() . $image->getClientOriginalName();
            $image->move('uploads/product', $imageNewName);
            $product->image = 'uploads/product/' . $imageNewName;

        }
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
        Session::flash('Success', 'Пост успішно оновлений!');

        return redirect()->route('admin.product.index');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $images = Images::where('products_id', '=', $id);

        $images->delete();

        Session::flash('Success', 'Пост успішно видалений!');

        return redirect()->route('admin.product.index');
    }

}
