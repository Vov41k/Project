@extends('layouts.appmain')

@section('content')
   <div class="banner">
       @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
        <div class="container">
              <script src="{{asset ('js/responsiveslides.min.js')}}"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
            <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>

                        <div class="banner-text">
                            <h3>Lorem Ipsum is not simply dummy  </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
                        <a href="single.html">Learn More</a>
                        </div>

                </li>
                <li>

                        <div class="banner-text">
                            <h3>There are many variations </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
                                                <a href="single.html">Learn More</a>

                        </div>

                </li>
                <li>
                        <div class="banner-text">
                            <h3>Sed ut perspiciatis unde omnis</h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor .</p>
                                <a href="single.html">Learn More</a>

                        </div>

                </li>
            </ul>
        </div>

    </div>
    </div>



<div class="content">
    <div class="container">
    <div class="content-top">
        <h1>NEW RELEASED</h1>
        <br>
        <hr>
        <div class="row">
                  @foreach($productsOrder as $key=>$product)
                  <div class="single-top-in simpleCart_shelfItem">

               @if($key % 3 == 0)
               <div class="clearfix"> </div>
               @endif

<div class="col-md-4 grid-top bottom-space">
                <a href="{{route('showselectedproduct',$product->id)}}" class="b-link-stripe b-animate-go  thickbox minheight"><img class="img-responsive imgsize" src="{{($product->image)}}"   alt="">
                            <div class="b-wrapper">
                                    <h3 class="b-animate b-from-left    b-delay03  prova ">
                                        <span>{{($product->title)}}</span>
                                        <br>

                                        <button class="btn btn-success" id="{{$product->id}}">Buy NOW</button>
                                    </h3>
                                </div>
                </a>



          <!--   <p><a href="">{{($product->title)}}</a></p> -->
            <a href="{{route('addtocart',$product->id)}}" class="item_add"><p class="number item_price"><i> </i>{{$product->price}} $</p></a>

            </div>




</div>
    @endforeach


                    <div class="clearfix"> </div>
        </div>

    </div>
@widget('recentBaner')

 <!--     -->
    <!-- </div> -->

    <div class="content-bottom">
        <ul>
            <li><a href="#"><img class="img-responsive" src="images/lo.png" alt=""></a></li>
            <li><a href="#"><img class="img-responsive" src="images/lo1.png" alt=""></a></li>
            <li><a href="#"><img class="img-responsive" src="images/lo2.png" alt=""></a></li>
            <li><a href="#"><img class="img-responsive" src="images/lo3.png" alt=""></a></li>
            <li><a href="#"><img class="img-responsive" src="images/lo4.png" alt=""></a></li>
            <li><a href="#"><img class="img-responsive" src="images/lo5.png" alt=""></a></li>
        <div class="clearfix"> </div>
        </ul>
    </div>
</div>
</div>
@endsection
