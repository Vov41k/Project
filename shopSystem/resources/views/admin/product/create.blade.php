@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Створити новий товар</h2>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field ()}}
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" name="title" class="form-control" value="{{old ('title')}}">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Зображення</label>
                        <input type="file" name="image" class="form-control">
                        @if ($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('image') }}
                            </div>
                        @endif
                    </div>
                        <div class="form-group">
                        <label for="image">Зображення Слайдер</label>
                        <input type="file" name="imageSlider[]" class="form-control" multiple>
                        @if ($errors->has('imagslider'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('imageslider') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Виберіть категорію</label>
                        <select name="category_id" id="category" class="form-control" name="category">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                    </div>














                    <div class="form-group">
                        <label for="description">Опис</label>
                        <textarea type="text" name="description" class="form-control" id="content" cols="5"
                                  rows="5">{{old ('description')}}</textarea>
                        @if ($errors->has('description'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Ціна</label>
                        <input type="text" name="price" class="form-control" value="{{old ('price')}}">
                        @if ($errors->has('price'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>

        <!--     <div class="form-group options-container">
                <h3>Options</h3>
                        <label for="type">Тип</label>

                        <input type="text" name="type">
                        <label for="value">Значення</label>
                        <input type="text" name="value">

                        <a href="" class="btn btn-danger deleteoption">Видалити</a>



                    </div> -->
                    <a href="" id="createOptions" class="btn btn-info"> + Add Options</a>

                  <hr>







                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success">
                                Зберегти
                            </button>
                        </div>
                    </div>







                </form>
            </div>
        </div>
    </div>
    </div>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

@endsection

@section('js')


 <script>

 var count=0;


     $(document).ready(function () {



        $('#createOptions').on('click',function(e){


            e.preventDefault();
           count++;
             console.log(count);
             var template= '<div class="form-group options-container">'+
                '<h3>Options "' +count+'"</h3>'+
                        '<label for="type">Тип</label>'+

                        '<input type="text" name="type'+count+'">'+



                        '<label for="value">Значення</label>'+


                        '<input type="text" name="value'+count+'">'+
                        '<a href="" class="btn btn-danger deleteoption">Видалити</a>'+
                        '<hr>'+
                       
                        // ' <a href="" id="deletetype" class="btn btn-danger deletestype"> + Delete type and value for options '+count+'</a>'+
                        '<hr>'+
                        '<div class="inserting'+count+'"></div>'+
                         '<label for="value">Quantity</label>'+

                        '<input type="text" name="qty'+count+'">'+

                        '<hr>'+

                         '<label for="image">Зображення</label>'+
                        '<input type="file" name="imageOption'+count+'" class="col-md-4 col-sm-4">'+
                        '<hr>'+
                         // ' <a href="" id="addtype'+count+'" name="opt'+count+'" data-number="'+count+'"  class="btn btn-info newtype"> + Add type and value for options '+count+'</a>'+
                        '</div>'+
                        '<hr>'




            $(this).before(template);


        });



        $(document).on('click','.deleteoption',function(e){
             e.preventDefault();

               $(this).parents('.options-container').remove();

         });

     })


          $(document).on('click','.deletestype',function(e){
             e.preventDefault();


               // $(this).parents('.options-container2').remove();

         });





    </script>

@endsection
