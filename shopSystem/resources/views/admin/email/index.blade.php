<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
</head>
<body>
	<div class="container">
		<h2>Dear Subscribers</h2>
		<br>

			<p>We would like to notify you about our new news, because you are subscribered to our site</p>
			<br>

			<h3>{{$title}}</h3>
			<br>
			<p>{{$description_short}}</p>
			<br>
			<img src="{{asset($image)}}" alt="kartinka">
			<br>
			<br>
			<p>{{$description}}</p>
			<p>Thank You</p>
	</div>




</body>
</html>
