
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

-->


<!DOCTYPE html>
<html>
<head>
<title>New Store A Ecommerce Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>

<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css" media="all" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!-- <script src="{{asset('js/simpleCart.min.js')}}"> </script> -->
<script src="{{asset('js/main.js')}}"></script>


</head>
<body>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">

            <div class="search">
                    <form action="{{route('search')}}" method="POST">
                         {{ csrf_field() }}
                        <input type="text" name="search" value="@yield('searchinput')" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="Go">
                    </form>


            </div>

            <div class="header-left">
                <div class="row">
                    <div class="col-sm-6">

                @if (Route::has('login'))
        <div class="top-right links">
            @auth
         
            <ul class="list-inline">
                <!-- <li> <a href="{{ url('/home') }}">Exit</a></li> -->

                  <!-- <li> <a href="{{ route('logout') }}">Exit</a></li> -->
                     <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Exit
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

            </ul>
               <ul>
                    <li style="color:white">
                       Welcome : {{Auth::user()->name}}

                    </li>
                     @if(Auth::user()->hasRole('admin'))
                    <li>
                      
                     
                        <a href="/login">Admin Panel</a>

                  
               
          
                    </li>
                    @endif
                </ul>

                @else
                <ul class="row">
                    <li class="col-sm-6"> <a href="{{ route('login') }}">Логін</a></li>
                    <li class="col-sm-6"><a href="{{ route('register') }}">Реєстрація</a></li>
                </ul>


                    @endauth
        </div>
                    @endif
                    </div>
                    <div class="col-sm-6">

                    <div class="cart box_1">
                        <a href="{{route('cart')}}">
                        <h3> <div class="total">
                              <p class="totalCart">Your Cart :{{$count}} items</p>
                            <span class="simpleCart_total"></span><span id="simpleCart_quantity" class="simpleCart_quantity"></span> Cart</div>
                            <img src="{{asset('images/cart.png')}}" alt=""/></h3>

                        </a>

                        <!-- <p><a href="{{route('cart')}}">Cart</a></p> -->
                        <p><a href="{{route('emptycart')}}" class="simpleCart_empty">Empty Cart</a></p>

                    </div>
                    </div>
                </div>




                    <div class="clearfix"> </div>
            </div>
                <div class="clearfix"> </div>
        </div>

        </div>


        @widget('recentCategory')

    </div>



<!--content-->
  @yield('content')


<div class="footer">
                <div class="container">
            <div class="footer-top-at">

                <div class="col-md-4 amet-sed">
                <h4>MORE INFO</h4>
                <ul class="nav-bottom">
                        <li><a href="#">How to order</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="contact.html">Location</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Membership</a></li>
                    </ul>
                </div>
                <div class="col-md-4 amet-sed ">
                <h4>CONTACT US</h4>

                    <p>
Contrary to popular belief</p>
                    <p>The standard chunk</p>
                    <p>office:  +12 34 995 0792</p>
                    <ul class="social">
                        <li><a href="#"><i> </i></a></li>
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="rss"> </i></a></li>
                        <li><a href="#"><i class="gmail"> </i></a></li>

                    </ul>
                </div>
                <div class="col-md-4 amet-sed">
                    <h4>Newsletter</h4>
                    <p>Sign Up to get all news update
and promo</p>
                    <form action="{{route('subscribers')}}" method="post">
                        <input type="email" required value=""  name='email' onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                        <input type="hidden" name="footer" value="footer">
                         {{ csrf_field() }}
                        <input type="submit" value="Sign up" id="submit11">
                    </form>
                </div>
                @if ($errors->has('email'))
                    <div class="col-md-4 amet-sed">

                    <div class="alert alert-danger " role="alert">
                        {{ $errors->first('email') }}
                    </div>
                    </div>
                @endif
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-class">
     
        </div>
        </div>
        <script src="{{asset('js/store.js')}}"></script>
        @yield('script')

</body>
</html>
