<link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<img src="{{ url('/assets/imgs/personal_details/download.png') }}" width="130" height="130">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b>Application ID:</b>&nbsp;APE305MM2019</span>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<p><span><b>Academic Year:</b> 2019-2020</span></p>
		</div>
	</div>

	<div class="row">
		<h4><b>Student Personal Details:</b></h4>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->address}}</td>
					<td>{{$data->mobile}}</td>
					<td>{{$data->email}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row">
		<h4><b>Student Academic Details:</b></h4>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>College Name</th>
					<th>Academic Year</th>
					<th>Course</th>
					<th>Percentage</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$data1->college_name}}</td>
					<td>{{$data1->course_year}}</td>
					<td>{{$data1->sub_course}}</td>
					<td>{{$data1->percentage}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>