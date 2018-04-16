@extends('adminlte::page')
@section('content')
   <div class="row">
        <div class="col-md-12 text-center">
            <h2>Our news</h2>
            <br>
            <div class="container">




                 <div class="panel panel-default">


        <div class="panel-heading"><h5>{{$news->title}}</h5>  <small class="text-warning">{{$news->created_at}}</small></div>

          <div class="panel-body">

            <h2>{{$news->deskription_short}}</h2>
            <br>
            @if($news->image!="noImage")
                <img src="{{asset($news->image)}}" alt="image" width="800wh" height="500vh">

            @endif
            <br>
            <br>

            <p>{{$news->deskription}}</p>







          </div>





  </div>


            <br>





        </div>

</div>


    </div>
@endsection
