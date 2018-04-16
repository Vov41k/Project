@extends('adminlte::page')
@section('content')

<div class="row">
	<div class="container text-center">
		<h2>Options</h2>
	</div>
	<hr>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Image</th>
		<th>Type</th>
		<th>Value</th>
		<th>Quantity</th>
		<th>Редагувати</th>
		<th>Видалити</th>
	</tr>

@foreach($bundle as $bundl)

<tr>

@foreach($bundl->option as $opt)
<td>{{$opt->id}}</td>
	<td><img src="{{asset($bundl->image)}}" alt="" width="40px" height="40px"></td>

<td>{{$opt->type}}</td>
<td>{{$opt->value}}</td>
<td>{{$bundl->qty}}</td>

<td><a href="{{route('admin.productsoptionedit',[$id,$opt->id])}}" class="btn btn-info">Редагувати</a></td>
<td><form action="{{route('admin.productsoptiondelete',[$id,$opt->id])}}" method="post">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 <input type="hidden" name="_method" value="DELETE">


	<button type="submit" class="btn btn-danger">Видалити</button>
</form></td>


@endforeach
</tr>
@endforeach


</table>


<hr>


<div class="text-center">
	<h3>Створити опцію</h3>
</div>


<div class="col-md-12">

  <form class="form" method="POST" enctype="multipart/form-data" action="{{route('admin.productsoptionsave',$id)}}">
  {{ csrf_field() }}

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="type" id="colFormLabelSm" placeholder="type" value="">
    </div>

  </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Value</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="value" id="colFormLabelSm" placeholder="value" value="">
    </div>

  </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">quantity</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="qty" id="colFormLabelSm" placeholder="quantity" value="">
    </div>

  </div>
     <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Зображення</label>
    <div class="col-sm-8">
      <input type="file" class="form-control form-control-sm" name="image" id="colFormLabelSm" placeholder="image" value="">
    </div>

  </div>




  <button type="submit" class="btn btn-primary">Save</button>
</form>



</div>







</div>

@endsection
