@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <br>

        <h1>Creation...</h1>
        <br>
        <div class="container col-offset-4">
             <a href="{{route('admin.category.index')}}"
           class="btn btn-primary pull-right">Назад</a>
        </div>
       

        {!!Form::open(['route' => 'admin.category.store', 'files' => 'true'],['class' => 'form','enctype'=>'multipart/form-data'])!!}


        @include('admin.category._form')


        {!! Form::close() !!}


    </div>
    </div>
@endsection
