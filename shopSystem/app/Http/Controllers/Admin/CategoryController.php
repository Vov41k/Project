<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {

        $category = Category::all();

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        //dd($request);

        $image        = $request->image;
        $data = $request->except('image');
       
        if($image!=null){
        $imageNewName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/', $imageNewName);

      
        

        $data['image'] = 'uploads/product/' . $imageNewName;
        
        }else {
             $data['image']='noimage';
        }
        Category::create($data);

        Session::flash('Success', 'Категорія збережена');
        return redirect()->route('admin.category.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CreateCategoryRequest $request, $id)
    {

        $category         = Category::find($id);
        $takesDateRequest = $category->fill($request->all());
        $takesDateRequest->save();
        Session::flash('Success', 'Категорія успішно оновлена!');

        return redirect()->route('admin.category.index');

    }

    public function destroy($id)
    {
        $findCategory = Category::find($id);
    
        $findCategory->delete();
        Session::flash('Success', 'Категорія успішно видалена!');

        return redirect()->route('admin.category.index');
    }
}
