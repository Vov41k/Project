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

                    <tr class="text-align-center">
                        <thead>
                        <th>
                            Зображення продукту
                        </th>
                        <th>
                            Назва продукту
                        </th>
                        <th>
                            Опис продукту
                        </th>
                        <th>
                            Ціна продукту
                        </th>

                        <th>
                            Створено
                        </th>
                        <th>
                            Комменти до продукту
                        </th>

                        </thead>

                    </tr>
                    <tbody>
                    @foreach($products as $p)
                        <tr>

                            <td> <img src="{{asset($p->image)}}" height="72" width="72"></td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->price}}</td>

                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td><a class="btn btn-success" href="{{route ('admin.comments.show', ['id'=>$p->id])}}">Комменти</td>



                            <td>

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
