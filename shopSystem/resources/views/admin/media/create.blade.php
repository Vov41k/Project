@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">
		<h1>Creation...</h1>

		<br>
  {!!Form::open(['route' => 'admin.media.store','files' => true],['class' => 'form'])!!}
  {{ csrf_field() }}
	@include('admin.media._form')
{!! Form::close() !!}
    </div>
@endsection
