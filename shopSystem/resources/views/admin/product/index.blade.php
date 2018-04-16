@extends('adminlte::page')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-lg-9">
        <div class="panel panel-default">
            @if(Session::has('Success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('Success')}}
                </div>
            @endif
            <div class="panel-body">
                <table class="table table-hover table-responsive text-sm-center" id="table">
                    <a href="{{route('admin.product.create')}}" class="btn btn-primary">Створити продукт</a>
                    <tr class="text-align-center">
                        <thead>
                        <th>
                            Зображення
                        </th>
                        <th>
                            Назва
                        </th>
                        <th>
                            Опис
                        </th>
                        <th>
                            Ціна
                        </th>
                        <th>
                            Активувати
                        </th>
                        <th>
                            Створено
                        </th>
                        <th>
                            Ред
                        </th>
                        <th>
                            Видал
                        </th>
                         <th>
                            Опції
                        </th>
                        </thead>

                    </tr>
                    <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td><a href="{{route ('admin.product.show', ['id'=>$p->id])}}">
                                    <img src="{{$p->image}}" height="72" width="72"></a></td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                                <input data-action="{{route('admin.product.activate', ['id'=>$p->id])}}" type="checkbox"
                                       name="activatebtn" value="{{$p->id}}"
                                        {{($p->active==1)?'checked="checked"' : ''}}>
                            </td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td><a href="{{route('admin.product.edit', ['id'=>$p->id])}}" class="btn btn-info btn-xs">Редагувати</a>
                            </td>
                            <td>
                                <form action="{{route('admin.product.destroy', ['id'=>$p->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-xs">X
                                    </button>
                                </form>
                            </td>


                                 <td>
                                    <a href="{{route('admin.productsoption',['id'=>$p->id])}}" class="btn btn-info">Опції</a>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            checkbox = $('input[name="activatebtn"]');
            checkbox.change(function () {
                var url = $(this).data('action');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: url,
                    contentType: 'json',
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                    }
                })
            })
        });
    </script>
@stop
