<link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">

<div class="container">

	<div class="row">
		<h4><b>TENNIS  Registration Details:</b></h4>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Department</th>
					<th>participate1</th>
					<th>participate2</th>
				</tr>
			</thead>1
			<tbody>
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->email}}</td>
					<td>{{$data->mobile}}</td>
					<td>{{$data->Department}}</td>
					<td>{{$data->participate1}}</td>
					<td>{{$data->participate2}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>