@include('inc.navbar')

<div class="container">
	<div class="row">
		<div class="alert alert-success">
			<p>E-mail verified Successfully Please login!</p>
		</div>
	</div>
	<div class="row">
		<a href="{{ url('/login_page') }}" class="btn btn-success">Log In</a>
	</div>
</div>