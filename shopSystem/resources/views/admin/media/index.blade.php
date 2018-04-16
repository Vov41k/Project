@extends('adminlte::page')
@section('content')
   <div class="row">
    <div class="col-lg-9">
        <p>HOME PAGE</p>
        <h1>Media</h1>
        <hr>
        <a href="{{route('admin.media.create')}}" class="btn btn-primary">Create New Type</a>
        <hr>
        <table class="table table-active">
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Url</th>
            </tr>
            @foreach($all as $i)
                <tr>
                       @switch($i->type)
                        @case('video')
                      <td><video width="200" controls>
  <source src="{{asset($i->url)}}">

  Your browser does not support HTML5 video.
</video></td>
                        @break
                          @case('image')
                           <td><img src="{{asset($i->url)}}" height="100px" width="200px" alt="Kartinka"></td>
                        @break
                        
                          @case('music')
                          <td>
                              <audio style="width: 200px;" controls>
<source src="{{asset($i->url)}}" type="audio/ogg">

Your browser does not support the audio element.
</audio>
                          </td>
                        
                        @break
                         @default
                          <td>No Image</td>
                       
                       @endswitch
                 
                    <td>{{$i->id}}</td>
                    <td>{{$i->title}}</td>
                    <td>{{$i->type}}</td>
                    <td>{{$i->url}}</td>
                    <td>
                        <form action="{{route('admin.media.destroy',$i->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('admin.media.edit',$i->id)}}" class="btn btn-success">edit</a>
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
    @endsection
