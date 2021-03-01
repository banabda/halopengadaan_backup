<!DOCTYPE html>
<html>
<head>
	<title>Hallo pengadaan - Data Invoice</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 18px;
		}
	</style>
	<center>
		<h1>Data Invoice</h1>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
	</center>

	<table border="1">
			<tr>
				<th>No</th>
                <th>Paket</th>
                <th>Total Pembayaran</th>
                <th>Tanggal</th>
			</tr>
		<tbody>
			@php $i=1 @endphp
			@foreach($invoice as $n)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$n->paket}}</td>
				<td>{{$n->tagihan}}</td>
				<td>{{$n->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
