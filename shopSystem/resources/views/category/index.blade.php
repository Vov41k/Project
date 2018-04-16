
@extends('layouts.appmain')



@section('content')

<hr>

<div class="container">

    <!--content-->
<!---->
        <div class="product">
            <div class="container">
                <div class="col-md-3 product-price">


                <!--initiate accordion-->
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                                <hr>
                                <div class="filters">
                                       <h2>Filters</h2>
                                            <br>
                                       <form action="{{route('category.filter',$id)}}" class="form-horizontal" method="POST">
                                        {{csrf_field ()}}

                                            <div class="form-group">
                                                 <span class="control-label col-md-2"><b>Price</b></span>
                                                 <hr>

                                                    <div class="form-group">
                                                        <div class="row">
                                                                       <label for="min_price" class="control-label col-md-2">Min</label>
                                                                 <div class="col-md-5">
                                                                     <input type="text" value="{{$minPrice}}" class="form-control" name="min_price[]">
                                                                 </div>
                                                        </div>

                                                    </div>
                                                     <br>
                                                    <div class="form-group">
                                                        <div class="row">
                                                                    <label for="max_price" class="control-label col-md-2">Max</label>
                                                                     <div class="col-md-5">
                                                                          <input type="text" value="{{$maxPrice}}" name="max_price[]" class="form-control">
                                                                     </div>
                                                        </div>

                                                    </div>

                                                    <hr>

                                            </div>

                                            @foreach($arrFilter as $key=>$value)

                                            <div class="form-group">

                                                <span class="control-label col-md-2"><b>{{$key}}</b></span>
                                                <hr>
                                                @foreach($value as $key2=>$value2)
                                                    <div class="form-group">
                                                    <div class="row">
                                                    <label for="{{$key2}}" class="col-md-3">{{$key2}}</label>
                                                    <input type="checkbox" name="{{$key}}[]" id="{{$value2}}"  value="{{$key2}}" class="col-md-9 {{$key}}">
                                                    </div>
                                                    <br>


                                                </div>
                                                @endforeach





                                            </div>
                                            <script type="text/javascript">
                                                        $(".{{$key}}").on('change', function() {
                                              $('.{{$key}}').not(this).prop('checked', false);
                                                     });
                                                
//                                                
                                                
                                                
                                                


                                            </script>


                                            @endforeach



                                                <br>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                    <button type="submit" class="btn btn-info btn-block">Filter</button>

                                                    </div>
                                                </div>
                                            </div>


                                       </form>

                                </div>

        </div>
                <!---->
                <div class="product-bottom">
                    <div class="of-left-in">
                                <h3 class="best">Best Sellers</h3>
                            </div>

@foreach($showBestProducts as $best)

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
<!-- <div class=" per1">
                <a href="single.html" ><img class="img-responsive" src="{{asset('images/pro.jpg')}}" alt="">

            </div> -->
                </div>
                <div class="col-md-9 product1">
                <div class=" bottom-product row">

                    @foreach($showProducts as $product)
     <div class=" simpleCart_shelfItem col-sm-4 col-md-4 col-xs-12 ol">
                        <div class="product-at product-height">
                            <a href="{{route('showselectedproduct',$product->id)}}"><img class="img-responsive" src="{{asset($product->image)}}" alt="">
                            <div class="pro-grid">
                                        <span class="buy-in">Buy Now</span>
                            </div>
                        </a>
                        </div>
                        <p class="tun">{{$product->title}}</p>


                        <a href="{{route('addtocart',$product->id)}}" id="{{$product->id}}" class="item_add"><p class="number item_price"><i> </i>{{$product->price}} $</p></a>
                        <br>
                    </div>


                    @endforeach
                    <br>





<!--
                    <div class="clearfix"> </div> -->
                </div>

                </div>
        <!-- <div class="clearfix"> </div> -->
        <div class="text-center">
<div class="pagination ">
    <br>
      <p>{{ $showProducts->links() }}</p>


</div>
</div>
        </div>

        </div>






    </div>
    <script>
///script for checkbox and loading product from DB, can be used without reload page(ajax )  
//     
//        
//
//
//	$('.form-horizontal input[type=checkbox]').change(function() {
//        $('.ol').empty();
//       
//
//  var value = $(this).val();
//        
//        
//                     $.ajaxSetup({
////                      header:$('meta[name="_token"]').attr('content')
//    headers: {
//        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//    }
//});
//          var text=$('#text').val();
//        
//       
//          var url=$(".form-horizontal").attr('action');
//          var token = "{{Session::token()}}";
//        var data=$('.form-horizontal').serialize();
//       
//        var post=$('.form-horizontal').attr('method');
////        var x=$(".form-horizontal input[type=checkbox]").val();
////        console.log(x)
////        console.log(data);
////        alert(vote);
////        alert(url);
////        console.log(text);
////        var template='<div class=" simpleCart_shelfItem col-sm-4 col-md-4 col-xs-12">'+
////                        '<div class="product-at product-height">'+
////                         
////                           '<div class="pro-grid">'+
////                                       '<span class="buy-in">Buy Now</span>'+
////                            '</div>'+
////                       ' </a>'+
////                       ' </div>'+
////                       ' <p class="tun">'+'</p>'+
////
////
////                      
////                       '<br>'+
////                    '</div>';
//        
//      
//
//              $.ajax({
//
//          type: post,
//          url: url,
////          data:$(this).serialize(),
//          data: data,
//          dataTy: 'json',
////          cache: false,
////          processData: false,
////         data: { 'body':text,'rating-input-1':vote, },          
//          success: function(data){
//              
//              console.log(data);
////              $(".form-horizontal input[type=checkbox]").val().each(function() {
////
////	 alert($(this).attr('type'))
////
////	});
//              var unique = data[1].filter((v, i, a) => a.indexOf(v) === i); 
////              console.log(data[1])
////              console.log(unique);
//              var cs=[];
//            for(var a in data[1]){
////                console.log(data[1][a])
//                cs.push(data[1][a]);
//            }
////              console.log(cs);
//                var m =$('.form-horizontal input[type=checkbox]');
////            for(var y in data[1]){
//     
//        for(var i in m){
//           var a=0;
//           
//            
////            console.log(m[i])
////             console.log(m[i].className);
////            console.log(m[i].attr('class'))
//             for(var y in unique){
//                 
//                 if((m[i].value)==unique[y]){
////                     m[i].className.
//                     a++;
//                     
////                     continue;
//                 }
////                     m[i].disabled=true;
////                 } else {
////                      m[i].disabled=true;
////                 }
//                 
//                 
//                 
//             }
//            if(a>0){
//                m[i].disabled=false;
//            } else {
//                m[i].disabled=true;
//            }
//            
////            if(m[i].value)
//        }
//     
////                 $(".form-horizontal").not('[type="submit"]')
////                for(var i = 0; i < x.elements.length; i++){
////        el = x.elements[i];
////    }
////                              $(".form-horizontal").find("input").val().not('[type="submit"]').each(function() {
////
////	if()
////
////	});
////                console.log(data[1][y]);
////            }
//             
////              console.log(data[0]);
////              console.log(data[1]);
//              var data1=data[0];
////              console.log(data1);
//              for(var i in data1){
//                  
////                  console.log(data);
////                  console.log(data[i]);
//                  if(data1[i] instanceof Array){
////                      console.log(data[i][0]);
//                       for(var b in data1[i]){
////                           console.log(data1[i][b].id);
//                         var x;
//                         var y;
//                         var id=data1[i][b].id;
//                     x="'{{route('showselectedproduct',':id')}}'";
//                     x= x.replace(':id', id);
//                     y="'{{route('addtocart',':id')}}'";
//                     y= y.replace(':id', id); 
////                 window.location.href=x;
//                            var template='<p>'+data1[i][b].image+'</p>';
//                         
//                              var template="<div class='simpleCart_shelfItem col-sm-4 col-md-4 col-xs-12 ol'>"+
//                        "<div class='product-at product-height'>"+
//                                    "<a href="+x+"><img class='img-responsive' src='"+data1[i][b].image+"' alt=''>"+
//                         
//                           "<div class='pro-grid'>"+
//                                       "<span class='buy-in'>Buy Now</span>"+
//                            "</div>"+
//                       "</a>"+
//                       "</div>"+
//                       "<p class='tun'>"+data1[i][b].title+"</p>"+
//
//
//                      "<a href="+y+" id='"+data1[i][b].id+"' class='item_add'><p class='number item_price'><i> </i>"+data1[i][b].price+" $</p></a>"+
//                       "<br>"+
//                    "</div>";
////                             console.log(data[i][b]);
//                             $('.bottom-product').after(template);
//                       }
//                  }
////                  console.log(data[i].data.price);
////                   for(var b in data[i]){
////                       console.log(data[i][b]);
//                       
////                          var template='<p>'+data[i][b].id+'</p>';
////                       $('.product1').before(template);
////                       console.log(data[i][b].id);
////                   }
//              }
//          
//             
////         
////            $("#bag").html('My Shopping Bag'+" "+"("+data.count+")"); 
////
////           $("#qty"+id).html('Qty :'+ data.qty); 
////            $(".subtotal").html(data.subtotal);
//             // $("#price").html(price+'$');
//        
//        }});
//
//        
//        
//        
//        
//        
//          
//  
//    })
//    
//
//    
    
    
    





</script>












@endsection
