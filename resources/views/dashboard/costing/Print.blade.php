<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
	<table class="table table-bordered">
		<thead>
			<th>Name</th>
			<th>Email</th>
		</thead>
		<tbody>
			@foreach ($costs as $key => $value)
			<tr>
				<td>{{ $value->margin }} %</td>
				<td>{{ $value->discount }} %</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>