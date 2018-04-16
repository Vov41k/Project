@extends('adminlte::page')
@section('content')

<div class="container">
    <h2>Subscribers</h2>
    <br>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Date Subscribe</th>
            <th>Delete</th>
        </tr>
           
            @foreach($subscribers as $subscriber)
            <tr>
                <td>{{$subscriber->id}}</td>
                <td> {{$subscriber->email}}</td>
                <td> {{$subscriber->created_at}}</td>
                <td> <form action="{{route('admin.deletesubscriber', ['id'=>$subscriber->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger">Delete
                                    </button>
                                </form></td>
            </tr>
        

    
    
    @endforeach
    </table>

    
    
    
    
</div>




@endsection