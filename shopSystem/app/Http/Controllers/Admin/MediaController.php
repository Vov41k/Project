<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMediaRequest;
use App\Media;
use Image;

class MediaController extends Controller
{

    public function index()
    {
        $all = Media::all();

        return view('admin.media.index', compact('all'));
    }

    public function create()
    {

        return view("admin.media.create");
    }

    public function store(CreateMediaRequest $request)
    {
        $all = Media::all();
//        $all=$request->all();
//        dd($all);
        $url = $request->url;

        $NewFileName = time() . $url->getClientOriginalName();

        $url->move('uploads/product', $NewFileName);
        $store = Media::create([
            'title' => $request->title,
            'type'  => $request->type,
            'url'   => 'uploads/product/' . $NewFileName,

        ]);
        return redirect()->route('admin.media.index');
    }

    public function show($id)
    {
//        $all = Media::find ( $id );
        //
        //        // return view('media.show', compact('all'));
        //        return redirect ( route ( 'admin.media.index' ) );
    }

    public function edit($id)
    {
        $edit = Media::find($id);
        return view('admin.media.edit', compact('edit'));
    }

    public function update(CreateMediaRequest $request, $id)
    {
        $media = Media::find($id);
        if (request()->hasFile('url')) {

            $url         = $request->url;
            $NewFileName = time() . $url->getClientOriginalName();
            $url->move('uploads/product', $NewFileName);
            $media->url = 'uploads/product/' . $NewFileName;
        }

        $save = $media->fill([
            'title' => $request->title,
            'type'  => $request->type,

        ]);
        $save->save();
        return redirect(route('admin.media.index'));
    }

    public function destroy($id)
    {
        $type = Media::find($id);
        $type->delete();

        return redirect(route('admin.media.index'));
    }

}
