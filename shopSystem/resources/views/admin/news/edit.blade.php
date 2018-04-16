@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit News</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('admin.news.index') }}"> Back</a>
                    </div>
                </div>
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

        {!! Form::model($news, ['method' => 'PATCH','route' => ['admin.news.update', $news->id],'enctype'=>'multipart/form-data']) !!}

        @include('admin.news.form')

        {!! Form::close() !!}
    </div>

@endsection
