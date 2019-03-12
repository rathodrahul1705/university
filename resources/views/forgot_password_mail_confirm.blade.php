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
			<h1>Cadmi</h1>
		</div>
		<div class="row">

			<strong>Click on link  below</strong>
			<a href="{{ url('/') }}/confirm_forgot_password/{{$verification_string }}" class="btn btn-primary">{{ url('/') }}/confirm_forgot_password/{{$verification_string }} </a>

			<!-- <button class="btn btn-info">Verify email</button> -->
		</div>
	</div>
</body>
</html>