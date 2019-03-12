<link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">

<div class="container">

	<div class="row">
		<h4><b>FOOTBALL Registration Details:</b></h4>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Department</th>
					<th>participate1</th>
					<th>participate2</th>
					<th>participate3</th>
					<th>participate4</th>
					<th>participate5</th>
					<th>participate6</th>
					<th>participate7</th>
					<th>participate8</th>
					<th>participate9</th>
					<th>participate10</th>
					<th>participate11</th>
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
					<td>{{$data->participate3}}</td>
					<td>{{$data->participate4}}</td>
					<td>{{$data->participate5}}</td>
					<td>{{$data->participate6}}</td>
					<td>{{$data->participate7}}</td>
					<td>{{$data->participate8}}</td>
					<td>{{$data->participate9}}</td>
					<td>{{$data->participate10}}</td>
					<td>{{$data->participate11}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>