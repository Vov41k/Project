<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\News;
use App\User;
use Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {

        $news = News::latest()->paginate(5);

        return view('admin.news.index', compact('news'));

    }

    public function create()
    {

        return view('admin.news.create');

    }

    public function store(CreateNewsRequest $request)
    {
        if (request()->hasFile('url')) {

            $url         = $request->url;
            $NewFileName = time() . $url->getClientOriginalName();
            $url->move('uploads/product', $NewFileName);
            $url = 'uploads/product/' . $NewFileName;

        } else {
            // $url = "https://images.pexels.com/photos/776125/pexels-photo-776125.jpeg?w=940&h=650&auto=compress&cs=tinysrgb";
            $url = "noImage";
        }

        News::create([
            'title'             => $request->title,
            'deskription_short' => $request->deskription_short,
            'deskription'       => $request->deskription,
            'image'             => $url,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully');

    }

    public function show($id)
    {

        $news = News::find($id);

        return view('admin.news.show', compact('news'));

    }

    public function edit($id)
    {

        $news = News::find($id);

        return view('admin.news.edit', compact('news'));

    }

    public function update(CreateNewsRequest $request, $id)
    {
        $news = News::find($id);
        if (request()->hasFile('url')) {

            $url         = $request->url;
            $NewFileName = time() . $url->getClientOriginalName();
            $url->move('uploads/product', $NewFileName);
            $news->image = 'uploads/product/' . $NewFileName;
        }

        $fillNews = $news->fill([
            'title'             => $request->title,
            'deskription_short' => $request->deskription_short,
            'deskription'       => $request->deskription,

        ]);
        $fillNews->save();

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully');

    }

    public function destroy($id)
    {

        News::find($id)->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully');

    }

}
