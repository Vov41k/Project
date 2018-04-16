@extends('layouts.appmain')



@section('content')

<div class="container">
  <div class="jumbotron">
  	<hr>
    <h2 class="text-success">Order Confirmation</h2>
    <hr>

	<hr>
    <h3 class="text-primary"> Thank you! </h3>
    <hr>
    <hr>
    <h3>Your Order is in Elaboration</h3>
    <hr>

  </div>
@foreach($cartcontent as $content)

				<!-- <p>{{$content->options->image}}</p> -->


				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="{{$content->options->image}}" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="#">{{$content->name}}</a></h3>
						@foreach($content->options as $key=>$value)
						@if($key!='image')
						<br>
						<h3>{{$key}} : {{$value}}</h3>
						<br>
						
						@endif
						
						@endforeach
<!--
					
-->
						<br>
						<h3><a href="#" id="price">Price :{{$content->price}} $</a></h3>

						<br>


							 <div class="delivery">
							 	<h5>Quantity: {{$content->qty}}</h5>

							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>
					   </div>
					   <div class="clearfix"></div>

				  </div>



				@endforeach
				<hr>
				<br>
				<h2>Total price: {{$total}} $</h2>
				<br>
				<hr>

</div>


@endsection
