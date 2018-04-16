@extends('adminlte::page')
@section('content')
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Оформлення замовлення</h2>
            </div>
            <div class="panel-body">
                <form action="{{route('admin.orders.store')}}" method="post" >
                    {{csrf_field ()}}
                    <div class="form-group">
                        <label for="title">ПІБ менеджера</label>
                        <input type="text" name="manager_name" class="form-control" value="{{old ('title')}}">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
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
@endsection