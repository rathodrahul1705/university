<link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">

<div class="container">

	<div class="row">
		<h4><b>PUBG Mobile Registration Details:</b></h4>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Department</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->email}}</td>
					<td>{{$data->mobile}}</td>
					<td>{{$data->Department}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>