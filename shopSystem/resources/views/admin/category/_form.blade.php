


<div class="form-group row">
   {{Form::label('category_name', 'Category Name', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('category_name',$category->category_name ?? null ,['class' => 'form-control form-control-sm'])}}
  </div>
  @if ($errors->has('category_name'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('category_name') }}
  </div>
  @endif

</div>


<div class="form-group row">
  {{Form::label('meta_tag_title','Meta Tag Title',['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
  <div class="col-sm-8">
    {{Form::text('meta_tag_title',$category->meta_tag_title ?? null ,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('meta_tag_title'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('meta_tag_title') }}
  </div>
  @endif

</div>
<div class="form-group row">
  {{Form::label('status','Status',['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
  <div class="col-sm-8">
  {{Form::text('status',$category->status ?? null , ['class' => 'form-control form-control-sm'] )}}

</div>
@if ($errors->has('status'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('status') }}
  </div>
  @endif
</div>



<div class="form-group row">
   {{Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('description',$categories->description ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('description'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('description') }}
   </div>
  @endif


  </div>



  <div class="form-group row">
   {{Form::label('parent', 'Parent', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('parent',$categories->parent ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('parent'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('parent') }}
   </div>
  @endif

  </div>

  <div class="form-group row">
   {{Form::label('colum', 'Column', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('colum',$categories->colum ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('colum'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('colum') }}
   </div>
  @endif

  </div>
   <div class="form-group row">
   {{Form::label('filter', 'Filter', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('filter',$categories->filter ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('filter'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('filter') }}
   </div>
  @endif

  </div>
    <div class="form-group row">
   {{Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::file('image',$categories->image ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('image'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('image') }}
   </div>
  @endif

  </div>
    <div class="form-group row">
   {{Form::label('sort_order', 'Sort Order', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('sort_order',$categories->sort_order ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('sort_order'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('sort_order') }}
   </div>
  @endif

  </div>
     <div class="form-group row">
   {{Form::label('meta_tag_keywords', 'Meta Tag Keywords', ['class' => 'col-sm-2 col-form-label col-form-label-sm'])}}
   <div class="col-sm-8">
   {{ Form::text('meta_tag_keywords',$categories->meta_tag_keywords ?? null,['class' => 'form-control form-control-sm'])}}
  </div>
   @if ($errors->has('meta_tag_keywords'))
    <div class="alert alert-danger col-sm-2" role="alert">
  {{ $errors->first('meta_tag_keywords') }}
   </div>
  @endif

  </div>

{{ Form::submit('Save',['class' => 'btn btn-primary'])}}
