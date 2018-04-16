@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Кабінет {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    Ви зайшли як <strong>Користувач {{ Auth::user()->name }}</strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
