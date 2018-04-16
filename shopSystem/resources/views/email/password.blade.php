<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	<h1>Hello User</h1>

<p>You are receiving this email because we received a password reset request for your account.


<p><a href="{{ url('/password/reset/'.$token) }}" style="padding: 10px 25px; color:white;background-color: #f44336; text-align: center;
    text-decoration: none; display: inline-block; ">RESET PASSWORD</a></p>

Click <a href="{{ url('/password/reset/'.$token) }}">here</a> to reset your password

If you did not request a password reset, no further action is required</p>	


<h1>Regards New Store</h1>
	
</body>
</html>

