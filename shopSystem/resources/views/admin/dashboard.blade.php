@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Кабінет {{ Auth::user()->name }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Ви зайшли як <strong>{{ Auth::user()->name }}</strong>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
