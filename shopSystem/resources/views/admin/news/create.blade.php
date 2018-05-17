@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">


        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New News</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.news.index') }}"> Back</a>
            </div>
        </div>

    @if (count($errors) > 0)
   
        <div class="alert alert-danger">
            <strong>!!!!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif



    <div class="col-md-12">


    {!! Form::open(array('route' => 'admin.news.store','method'=>'POST','class'=>'form','enctype'=>'multipart/form-data')) !!}

         @include('admin.news.form')
    {!! Form::close() !!}
    </div>
    </div>

@endsection
