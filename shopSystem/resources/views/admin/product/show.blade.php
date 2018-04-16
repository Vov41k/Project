@extends('adminlte::page')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-lg-9">
        <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary pull-right">Назад</a>
            <h2>{{$product->title}}</h2>
        </div>
        <div class="panel-body">
            <img src="{{$product->image}}" height="auto" width="240">
            <div class="panel-item pull-right col-lg-6">
                <p>Назва:{{$product->title}}</p>
                <p>Опис:{{$product->description}}</p>
                <p>Ціна:{{$product->price}}</p>
                <p>Створено:{{$product->created_at->diffForHumans()}}</p>
            </div>
            </div>
        </div>
        </div>
@endsection