<div class="form-group row">
   {{Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('title',$edit->title ?? null ,['class' => 'form-control form-control-sm'])}}
  </div>
  @if ($errors->has('title'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('title') }}
  </div>
  @endif
</div>
<div class="form-group row">
   {{Form::label('type', 'Type', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   <!-- {{ Form::text('type',null ,['class' => 'form-control form-control-sm'])}} -->
   {{Form::select('type', ['music' => 'music', 'video' => 'video','image'=>'image'],NULL, array('class' => 'form-control form-control-sm'))}}
  </div>
   @if ($errors->has('type'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('type') }}
   </div>
  @endif
  </div>

<div class="form-group row">

   {{Form::label('url', 'Url', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::file('url',['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('url'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('url') }}
   </div>
  @endif
  </div>
{{ Form::submit('Save',['class' => 'btn btn-primary'])}}
