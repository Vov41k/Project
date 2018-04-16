@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">
        <div class="panel panel-default">
            @if(Session::has('Success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('Success')}}
                </div>
            @endif
            <div class="panel-body">
                <table class="table table-hover table-responsive text-sm-center">
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary">Створити категорію</a>
                    <tr>
                        <thead>
                        <th>
                            Назва категорії
                        </th>
                        <th>
                            Редагувати категорію
                        </th>
                        <th>
                            Видалити категорію
                        </th>
                        </thead>
                    </tr>
                    <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>
                                {{$cat->category_name}}
                            </td>
                            <td>
                                <a href="{{route('admin.category.edit', ['id'=>$cat->id])}}"
                                   class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('admin.category.destroy', ['id'=>$cat->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-xs">X
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection