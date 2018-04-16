

<div class="form-group row">
   {{Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('title',$news->title ?? null ,['class' => 'form-control form-control-sm'])}}
  </div>
  @if ($errors->has('title'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('title') }}
  </div>
  @endif




</div>

<div class="form-group row">
   {{Form::label('deskription_short', 'Description Short', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('deskription_short',$deskription_short ?? null ,['class' => 'form-control form-control-sm'])}}
  </div>
  @if ($errors->has('deskription_short'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('deskription_short') }}
  </div>
  @endif


</div>


<!-- <div class="col-xs-12 col-sm-12 col-md-12"> -->
        <div class="form-group row">
           {{Form::label('deskription', 'Description', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}

         <div class="col-sm-8">
                {!! Form::textarea('deskription', $news->deskription ?? null, array('placeholder' => 'deskription','class' => 'form-control')) !!}

        </div>
           @if ($errors->has('deskription'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('deskription') }}
  </div>
  @endif
  <!--   </div> -->
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



<!--     </div> -->


</div>
