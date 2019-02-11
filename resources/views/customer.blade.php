<!-- <a href="{{ url('/func_pdf') }}">Download pdf</a>
<table>
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
</table> -->




<!DOCTYPE html>
<html>
<head>
	<title>pdf</title>
</head>
<body>
	<h1>personal Details</h1>
<a href="{{url('/pdf')}}">Export PDF</a>
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>mobile</th>
      <th>address</th>
      <th>email</th>
      <th>student_photo</th>
      <th>student_signature</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $customer)
      <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->mobile }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->student_photo }}</td>
        <td>{{ $customer->student_signature }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>






