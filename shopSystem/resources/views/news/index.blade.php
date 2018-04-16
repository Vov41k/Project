@extends('layouts.appmain')


@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<br>
			<br>
			<h2>Our news</h2>
			<br>
			<div class="blog">

			<div class="container">


		<div class="blog-top">
		@foreach($news as $newsOne)




			  <div class="col-md-6 grid_3" height='300px'>
					<h3><a href="{{route('showNews',$newsOne->id)}}">{{$newsOne->title}}</a></h3>
					 	@if($newsOne->image!="noImage")

				<a href="{{route('showNews',$newsOne->id)}}" class="news1"><img src="{{asset($newsOne->image)}}" class="img-responsive" alt="image"></a>

				@else
				<a href="{{route('showNews',$newsOne->id)}}"><img src="" class="img-responsive" alt="NO IMAGE"/></a>

    	  	@endif


					<div class="blog-poast-info">
						<ul>
							<li><a class="admin" href="#"><i> </i> Admin </a></li>
							<li><span><i class="date"> </i>{{$newsOne->created_at}}</span></li>

						</ul>
				    </div>
					<p>{{$newsOne->deskription_short}}</p>
					<div class="button"><a href="{{route('showNews',$newsOne->id)}}">Read More</a></div>
				</div>








		@endforeach
			<div class="clearfix"> </div>
		 </div>
		</div>

</div>


	</div>
</div>



</div>

@endsection
