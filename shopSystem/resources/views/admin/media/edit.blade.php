@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">
<h1>Editing....</h1>
{!!Form::model($edit,['route' => ['admin.media.update', $edit->id],'method' => 'put','files' => true],['class' => 'form'])!!}

@include('admin.media._form')

{!! Form::close() !!}

    </div>
@endsection
