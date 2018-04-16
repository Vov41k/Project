@extends('adminlte::page')
@section('content')

<div class="row">

<div class="col-md-12">

  <form class="form" method="POST" enctype="multipart/form-data" action="{{route('admin.productsoptionupdate',[$id,$options->id])}}">
  {{ csrf_field() }}

   <input type="hidden" name="_method" value="patch">

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="type" id="colFormLabelSm" placeholder="type" value="{{$options->type}}">
    </div>

  </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Value</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="value" id="colFormLabelSm" placeholder="value" value="{{$options->value}}">
    </div>

  </div>
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">quantity</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="qty" id="colFormLabelSm" placeholder="quantity" value="{{$bundle->qty}}">
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
