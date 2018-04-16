@extends('layouts.appmain')


@section('content')



<div class="container">

			<div class="head-top">
				


				<div class="clearfix"> </div>
		</div>
		</div>

	</div>


<!--content-->
<!---->
		<div class="product">
			<div class="container">
				<div class="col-md-3 product-price">

				<!--initiate accordion-->

<!---->
	<div class="product-middle">

					<div class="fit-top">
						<h6 class="shop-top">Lorem Ipsum</h6>
						<a href="#" class="shop-now">SHOP NOW</a>
<div class="clearfix"> </div>
	</div>
				</div>
						<div class="sellers">
							<div class="of-left-in">
								<h3 class="tag">Tags</h3>
							</div>
								<div class="tags">
									<ul>
										<li><a href="#">design</a></li>
										<li><a href="#">fashion</a></li>
										<li><a href="#">lorem</a></li>
										<li><a href="#">dress</a></li>
										<li><a href="#">fashion</a></li>
										<li><a href="#">dress</a></li>
										<li><a href="#">design</a></li>
										<li><a href="#">dress</a></li>
										<li><a href="#">design</a></li>
										<li><a href="#">fashion</a></li>
										<li><a href="#">lorem</a></li>
										<li><a href="#">dress</a></li>

										<div class="clearfix"> </div>
									</ul>

								</div>

							

		</div>
				<!---->
				<div class="product-bottom">
					<div class="of-left-in">
								<h3 class="best">Best Sellers</h3>
							</div>
				@foreach($productsBest as $best)

                    <div class="product-go">
                        <div class=" fashion-grid">
                                    <a href="{{route('showselectedproduct', $best->id)}}"><img class="img-responsive " src="{{asset($best->image)}}" alt=""></a>

                                </div>
                            <div class=" fashion-grid1">
                                <h6 class="best2"><a href="single.html" >{{$best->title}}</a></h6>

                                <span class=" price-in1"> ${{$best->price}}</span>
                            </div>

                            <div class="clearfix"> </div>
                            </div>
                            @endforeach


				</div>
				<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });

			});
		</script>

				</div>
				<div class="col-md-9 product-price1">
				<div class="col-md-5 single-top">
			<div class="flexslider">
  <ul class="slides">
    <li data-thumb="{{asset($product->image)}}">
      <img src="{{asset($product->image)}}">
    </li>

    @foreach($product->images as $im)
  		<li data-thumb="{{asset($im->url)}}">
      <img src="{{asset($im->url)}}">
    </li>
    @endforeach
    <li data-thumb="{{asset($product->image)}}">
      <img src="{{asset($product->image)}}">
    </li>
  </ul>
</div>
<!-- FlexSlider -->
  <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

<script>

$(document).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails",
  });
});
</script>
					</div>
					<div class="col-md-7 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4>{{$product->title}}</h4>
							<div class="star-on">
								<ul class="star-footer">
									@for($i=0;$i<$avgvote;$i++)
									<li><i> </i></li>
									@endfor


									</ul>
								<div class="review">
									<a href="#"> {{$countComments}} customer review </a>

								</div>
							<div class="clearfix"> </div>
							</div>

							<h5 class="item_price">{{$product->price}} $</h5>
							<p>{{$product->description}}</p>
								<form action="{{route('addtocart',$product->id)}}" class="form" method="GET">

 											{{csrf_field ()}}
										@foreach($arrOptionValue as $key=>$value)
										  <label for="{{$key}}">{{$key}}</label>
										  <!-- exemple $key =Color than Size -->
                        			<select name="{{$key}}" id="{{$key}}" class="form-control" >

                            @foreach($value as $key2=>$val)
                         <!--    exemple $key2 == Red than XXL -->
                                <option value="{{$val}}" id="{{$key2}}">{{$val}}</option>
<!--                                key2 on value-->
                                @endforeach

                        </select>
                          @endforeach


									 <!-- <a href="#" onclick="this.parentNode.submit();" class="add-cart item_ad">ADD TO CART</a> -->
									<!-- <a href=""  type="submit" class="add-cart item_ad"></a> -->
									<button type="submit" class="btnnew add-cart item_ad">ADD TO CART</button>


								</form>







						</div>
						<br>
					</div>
				<div class="clearfix"> </div>
			<!---->
					<div class="cd-tabs">
			<nav>
				<ul class="cd-tabs-navigation">
					<li><a data-content="fashion"  href="#0">Description </a></li>
					<li><a data-content="cinema" href="#0" >Addtional Informatioan</a></li>
					<li><a data-content="television" href="#0" class="selected ">Reviews ({{$countComments}})</a></li>

				</ul>
			</nav>
	<ul class="cd-tabs-content">
		<li data-content="fashion" >
		<div class="facts">
									  <p > {{$product->description}}</p>
										<ul>
											<li>Research</li>
											<li>Design and Development</li>
											<li>Porting and Optimization</li>
											<li>System integration</li>
											<li>Verification, Validation and Testing</li>
											<li>Maintenance and Support</li>
										</ul>
							        </div>

</li>
<li data-content="cinema" >
		<div class="facts1">



									@foreach($arrOptionValue as $key=>$value)

									<div class="color"><p>{{$key}}</p>
										@foreach($value as $key2=> $val)

												<span >	{{$val}},&nbsp</span>

										@endforeach


							<div class="clearfix"></div>
						</div>




									@endforeach









			 </div>

</li>
<li data-content="television" class="selected">
						@foreach($commentsProduct as $comment)
	<div class="comments-top-top">
				
				<div class="top-comment-right">




	<h6>{{$comment->user->name}}  At {{$comment->created_at}}</h6>
						<ul class="star-footer">

	@for($i=0;$i<$comment->vote;$i++)
	<li><i> </i></li>
@endfor
									<!--
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li> -->

									</ul>
									<br>
										<h5>{{$comment->body}}</h5>

				</div>

				<div class="clearfix"> </div>
									@endforeach

				@if(Auth::user())
				@if (Session::has('Success'))
    <div class="alert alert-info">{{ Session::get('Success') }}</div>
@endif
						<div class="card">

												<div class="card-block">

													<form action="{{route('createcomment',$product->id)}}" method="POST">
														 {{ csrf_field() }}



														<div class="form-group">
															<textarea name="body" cols="30" class="form-control" rows="10" placeholder="YOUR Comments here"></textarea>

														</div>
														  <div class="form-group">
														  	<span class="rating">
												    <input type="radio" class="rating-input"
												           id="rating-input-1-5" name="rating-input-1" value="5">
												    <label for="rating-input-1-5" class="rating-star" ></label>
												    <input type="radio" class="rating-input"
												           id="rating-input-1-4" name="rating-input-1" value="4">
												    <label for="rating-input-1-4" class="rating-star"></label>
												    <input type="radio" class="rating-input"
												           id="rating-input-1-3" name="rating-input-1" value="3">
												    <label for="rating-input-1-3" class="rating-star"></label>
												    <input type="radio" class="rating-input"
												           id="rating-input-1-2" name="rating-input-1" value="2">
												    <label for="rating-input-1-2" class="rating-star"></label>
												    <input type="radio" class="rating-input"
												           id="rating-input-1-1" name="rating-input-1" value="1">
												    <label for="rating-input-1-1" class="rating-star"></label>
												</span>
														  </div>


														<div class="form-group">
															<button type="submit" class="btn btn-danger">SAVE</button>
														</div>
													</form>

												</div>



										</div>


										@else
										<br>
										<hr>
										<h4 class="text-warning" >
											<a href="{{ route('login') }}">Sign in</a> to live your comment
										</h4>
										<br>
										<hr>


										@endif
			</div>

</li>
<div class="clearfix"></div>
	</ul>
</div>
		<div class=" bottom-product">
{{$commentsProduct->links()}}
			<h3> Your Recent Views Products :</h3>

			<br>
			<hr>
			@foreach($productsVisited as $best)
					<div class=" col-xs-12 col-md-4  bottom-cd simpleCart_shelfItem">

						<div class="product-at selected_one">
							<a href="{{route('showselectedproduct', $best->id)}}"><img class="img-responsive" src="{{asset($best->image)}}" alt="">
							<div class="pro-grid">
										<span class="buy-in">Buy Now</span>
							</div>
						</a>
						</div>
						<p class="tun">{{$best->description}}</p>
						<a href="{{route('addtocart',$best->id)}}" class="item_add"><p class="number item_price"><i> </i>{{$best->price}}</p></a>
					</div>

					@endforeach


					<div class="clearfix"> </div>
				</div>
</div>

		<div class="clearfix"> </div>
		</div>
		</div>





@endsection
@section('script')
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
@endsection
