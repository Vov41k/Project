<?php

namespace App\Http\Controllers\Admin;

use App\BundleOptions;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Options;
use App\Product;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function index($id)
    {

        $bundle = BundleOptions::where('product_id', '=', $id)->get();

        $product = Product::find($id);

        return view('admin.options.index', compact('id', 'product', 'bundle'));

    }
    public function save(Request $request, $id)
    {
        $options = Options::create([

            'type'  => $request->type,
            'value' => $request->value,

        ]);

  

        if ($request->hasFile('image')) {
            $image        = $request->image;
            $imageNewName = time() . $image->getClientOriginalName();
            $image->move('uploads/product', $imageNewName);
            $options = BundleOptions::create([
                'product_id' => $id,
                'options_id' => $options->id,
                'qty'        => $request->qty,
                'image'      => 'uploads/product/' . $imageNewName,

            ]);

        } else {
            $bundle = BundleOptions::create([
                'product_id' => $id,
                'options_id' => $options->id,
                'qty'        => $request->qty,

            ]);

        }

        return back();
    }

    public function delete($id, $optid)
    {

        $options = Options::where('id', '=', $optid);
        $bundle  = BundleOptions::where('options_id', '=', $optid);
        $options->delete();
        $bundle->delete();
        return back();

    }

    public function edit($id, $optid)
    {
        // $options = Options::findOrFail($optid);
        $options = Options::find($optid);
        $bundle  = BundleOptions::where('options_id', '=', $optid)->First();

        return view('admin.options.edit', compact('id', 'optid', 'options', 'bundle'));

    }

    public function update(Request $request, $id, $optid)
    {

        $options = Options::find($optid);
        $bundle  = BundleOptions::where('options_id', '=', $optid)->First();
        // dd($bundle);
        if ($request->hasFile('image')) {
            $image        = $request->image;
            $imageNewName = time() . $image->getClientOriginalName();
            $image->move('uploads/product', $imageNewName);
            $bundle->image = 'uploads/product/' . $imageNewName;

        }
        $options->type  = $request->type;
        $options->value = $request->value;
        $bundle->qty    = $request->qty;

        $options->save();
        $bundle->save();
        $bundle = BundleOptions::where('product_id', '=', $id)->get();
        return redirect()->route('admin.productsoption', compact('bundle', 'id'));

    }
}
