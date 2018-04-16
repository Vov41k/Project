@extends('layouts.appmain')



@section('content')



			<div class="container">
				<br>
				<h1>Contact</h1>
			<div class="contact-form">

				<div class="col-md-8 contact-grid">
					@if(Auth::user())
					<form class="form" method="post" action="{{route('sendMessage')}}">
						 {{ csrf_field() }}


                    <div class="form-group">
						<input type="text" name="name" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}">
						      @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

						<div class="form-group">
						<input type="text" name="email" value="{{Auth::user()->email}}" placeholder="{{Auth::user()->email}}">
							      @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

					</div>
					<div class="form-group">
						<input type="text" value="" name="subject" placeholder="Subject">
							      @if ($errors->has('subject'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('subject') }}
                            </div>
                        @endif
						</div>
						<div class="form-group">
						<textarea cols="77" rows="6" name="bodymessage" placeholder="Your Message"></textarea>
						   @if ($errors->has('bodymessage'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('bodymessage') }}
                            </div>
                        @endif
					</div>
						<div class="send">
							<input type="submit" value="Send">
						</div>
					</form>

					@else
					<form class="form" method="post" action="{{route('sendMessage')}}">
						 {{ csrf_field() }}


                    <div class="form-group">
						<input type="text" name="name"  placeholder="Name">
						      @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

						<div class="form-group">
						<input type="text" name="email"  placeholder="Email">
							      @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

					</div>
					<div class="form-group">
						<input type="text" value="" name="subject" placeholder="Subject">
							      @if ($errors->has('subject'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('subject') }}
                            </div>
                        @endif
						</div>
						<div class="form-group">
						<textarea cols="77" rows="6" name="bodymessage" placeholder="Your Message"></textarea>
						   @if ($errors->has('bodymessage'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('bodymessage') }}
                            </div>
                        @endif
					</div>
						<div class="send">
							<input type="submit" value="Send">
						</div>
					</form>


					@endif
				</div>
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Address</h4>
							<p>The company name,</p>
							<p>Lorem ipsum dolor,</p>
							<p>Glasglow Dr 40 Fe 72. </p>
						</div>
						<div class="address-more">
						<h4>Address1</h4>
							<p>Tel:1115550001</p>
							<p>Fax:190-4509-494</p>
							<p>Email:<a href="mailto:contact@example.com"> contact@example.com</a></p>
						</div>

				</div>

				<div class="clearfix"> </div>
			</div>
		<!-- 	<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
			</div> -->

			<div id="googleMap" style="width:100%;height:400px;"></div>

		<script>
			var marker;
			 var uluru = {lat:40.6510425, lng: -74.31299};

			function myMap() {


        var mapProp = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 15,
          center: uluru
        });
         var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">SHOP</h1>'+
            '<div id="bodyContent">'+
            '<p><b>NEW STORE</b>, also referred to as <b>Store</b>, is a large ' +
            'sandstone store formation in the southern part of the NY '+
            '</p>'+

            '</div>'+
            '</div>';




  var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
   var marker = new google.maps.Marker({
          position: uluru,
          map: mapProp,
          title: 'Uluru (Ayers Rock)'
        });
   marker.addListener('click', function() {
          infowindow.open(mapProp, marker);
        });
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL3HQXKVmvWNYgkxbg6keXq9cTdrLI_6U&callback=myMap"
  type="text/javascript"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL3HQXKVmvWNYgkxbg6keXq9cTdrLI_6U=myMap"></script> -->










</div>

@endsection
