@include('inc.navbar')

<div class="container">
	<div class="row">
		<div class="alert alert-success">
			<p>E-mail verified Successfully, All the best for the Game!</p>
		</div>
	</div>
		<div class="row">
		Please Download PDF here <a href="{{ url('/verify_mail_tennis') }}" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
	</div>
</div>