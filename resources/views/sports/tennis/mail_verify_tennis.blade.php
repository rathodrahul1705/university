<!DOCTYPE html>
<html>
<head>
	<title>Verify Mail ::</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Welcome to CADMI</h1>
		</div>
		<div class="row">
			<p>We are happy that you are interested for pubg competetion</p>
			
			<span>Your Registration ID is: <b>{{$registration_id}}</b></span>

			Please follow the below link for the verification of email.
			
			<strong>Click on link  below</strong>
			<a href="{{ url('/') }}/verify_mail_tennis/{{$verification_string }}" class="btn btn-primary">{{ url('/') }}/verify_mail_tennis/{{$verification_string }} </a>
		</div>
	</div>
</body>
</html>