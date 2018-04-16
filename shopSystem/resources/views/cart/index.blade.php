@extends('layouts.appmain')



@section('content')
<div class="container">
	<div class="check">
			 <h1 id="bag">My Shopping Bag ({{$count}})</h1>
		 <div class="col-md-9 cart-items">

			<!-- 	<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});
					});
			   </script> -->
				@foreach($cartcontent as $content)

				<!-- <p>{{$content->options->image}}</p> -->
					 <div class="cart-header">
					 	<a  class="close1" href="{{route('remove', $content->rowId)}}"></a>
				 <!-- div class="close1"> <a href=""></a></div> -->
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
						<br>
						<h3><a href="#" id="price">Price :{{$content->price}} $</a></h3>
						<br>
						<ul class="qty inline">


							<li>
								<a href="{{route('qty.add',$content->rowId)}}" id="{{$content->rowId}}" class="btn btn-primary add">+</a>
							</li>
							<li><h6 id="qty{{$content->rowId}}" class="qty">Qty : {{$content->qty}}</h6></li>
							<li><a href="{{route('qty.reduce',$content->rowId)}}" id="{{$content->rowId}}" class="btn btn-primary reduce">-</a></li>

						</ul>

							 <div class="delivery">
							 <p>Service Charges : Rs.100.00</p>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>
					   </div>
					   <div class="clearfix"></div>

				  </div>
			 </div>


				@endforeach


			<!--  <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});
					});
			 </script> -->

		 </div>
		  <div class="col-md-3 cart-total">
			 <a class="continue" href="{{route('home')}}">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1 subtotal">{{$total}} $</span>
				 <span>Discount</span>
				 <span class="total1">---</span>
				<!--  <span>Delivery Charges</span>
				 <span class="total1">150.00</span> -->
				 <div class="clearfix"></div>
			 </div>
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>
			   <li class="last_price subtotal"><span  id="total">{{$total}} $</span></li>
			   <div class="clearfix"> </div>
			 </ul>


			 <div class="clearfix"></div>
			 <br>
			 <br>
			 <hr>
		<!-- 	 <a class="order" href="#">Place Order</a> -->
		@if(Auth::user())
					  <form action="{{route('order')}}" method="post" name="order" class="form">
			 <div class="form-group row">
<label for="formGroupExampleInput">Name :</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name='name' placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}">



			 </div>
			  <div class="form-group row">
<label for="formGroupExampleInput">Email :</label>
    <input type="email" class="form-control" id="formGroupExampleInput" name='email' placeholder="Auth::user()->email" value="{{Auth::user()->email}}">


			 </div>
			   {{ csrf_field() }}
			    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
		<button type="submit" class="btn btn-lg btn-block btn-warning order">Place Order</button>
   <!--    	<a href="#" type="submit" class="order">Place Order</a> -->


      </div>
    </div>

</form>
			<!--  //<a class="order" href="{{route('order')}}" method="post" name="order" >Place Order</a> -->
		@else
					  <form action="{{route('order')}}" method="post" name="order" class="form">
			 <div class="form-group row">
<label for="formGroupExampleInput">Name :</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name='name' placeholder="Name">



			 </div>
			  <div class="form-group row">
<label for="formGroupExampleInput">Email :</label>
    <input type="email" class="form-control" id="formGroupExampleInput" name='email' placeholder="Email">


			 </div>
			   {{ csrf_field() }}
			    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
		<button type="submit" class="btn btn-lg btn-block btn-warning order">Place Order</button>
   <!--    	<a href="#" type="submit" class="order">Place Order</a> -->


      </div>
    </div>

</form>

		@endif

			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div>
			</div>

			<div class="clearfix"> </div>
	 </div>
	 </div>





@endsection
