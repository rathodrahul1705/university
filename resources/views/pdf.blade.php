<a href="{{ url('/func_pdf') }}">Download pdf</a>
<!-- <table>
	<thead>
		<tr>
			<th>rahul</th>
			<th>rahul</th>
			<th>rahul</th>
			<th>rahul</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>rahul</td>
			<td>rahul</td>
			<td>rahul</td>
			<td>rahul</td>
		</tr>
	</tbody>
</table>

 -->

 <h1>Student Personal Details</h1>
<ul>
	<li>{{$personal_details->name}}</li>
	<li>{{$personal_details->mobile}}</li>
	<li>{{$personal_details->address}}</li>
</ul>