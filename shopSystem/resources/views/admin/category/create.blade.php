@extends('adminlte::page')
@section('content')
    <div class="col-lg-8">
        <br>

        <h1>Creation...</h1>
        <br>
        <a href="{{route('admin.category.index')}}"
           class="btn btn-primary pull-right">Назад</a>

        {!!Form::open(['route' => 'admin.category.store', 'files' => 'true'],['class' => 'form','enctype'=>'multipart/form-data'])!!}


        @include('admin.category._form')


        {!! Form::close() !!}


    </div>
@endsection
