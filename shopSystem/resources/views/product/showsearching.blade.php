
@extends('layouts.appmain')
@section('searchinput')

{{$value}}
@endsection


@section('content')

<hr>

<div class="container">

    <!--content-->
<!---->
<div class="text-center">
     <h3>You are searching: {{$value}} </h3>
     <br>
      <h4>Look what we found :</h4>
</div>

        <div class="product">
            <div class="container">

                <div class="col-md-3 product-price">


                <!--initiate accordion-->
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
<!---->
    <div class="product-middle">

                    <div class="fit-top">
                        <h6 class="shop-top">Lorem Ipsum</h6>
                        <a href="single.html" class="shop-now">SHOP NOW</a>
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

<!-- <div class=" per1">
                <a href="single.html" ><img class="img-responsive" src="{{asset('images/pro.jpg')}}" alt="">

            </div> -->
                </div>
                <div class="col-md-9 product1">

                <div class=" bottom-product">

                    @foreach($searchingitems as $product)
     <div class="col-md-4  simpleCart_shelfItem col-xs-12 col-sm-4">
                        <div class="product-at ">
                            <a href="{{route('showselectedproduct',$product->id)}}"><img class="img-responsive" src="{{asset($product->image)}}" alt="">
                            <div class="pro-grid">
                                        <span class="buy-in">Buy Now</span>
                            </div>
                        </a>
                        </div>
                        <p class="tun">{{$product->title}}</p>
                        <a href="{{route('addtocart',$product->id)}}" id="{{$product->id}}" class="item_add"><p class="number item_price"><i> </i>{{$product->price}} $</p></a>
                    </div>


                    @endforeach




                    <div class="clearfix"> </div>
                </div>

                </div>
        <div class="clearfix"> </div>

        </div>

        </div>






    </div>











@endsection
