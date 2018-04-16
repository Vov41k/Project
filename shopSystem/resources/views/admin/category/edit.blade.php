@extends('adminlte::page')
@section('content')
    <div class="col-lg-8">
<h1>Editing....</h1>
<br>
{!! Form::model($category,['route'=>['admin.category.update',$category->id],'method'=>'patch' ],
['class' => 'form'])!!}


@include('admin.category._form')


{!! Form::close() !!}

    </div>
@endsection
