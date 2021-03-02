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
            width: 100px;
            text-align: center;


		}

	</style>
	<center>
		<h2>Halo Pengadaan <br>INVOICE</h2>
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
    </center>
    <hr/>
    <h3 style="font-size: 18px"><b>Atas Nama :</b></h3>
    <br><br>

	<table style="margin-left:auto;margin-right:auto" border="1" >
			<tr>
				{{-- <th bgcolor="silver">No</th> --}}
                <th>Nama Paket</th>
                <th>Total Pembayaran</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
			</tr>
		<tbody>
			@php $i=1 @endphp
			@foreach($invoice as $n)
			<tr>
				{{-- <td>{{ $i++ }}</td> --}}
				<td>{{$n->paket}}</td>
				<td>{{$n->tagihan}}</td>
				<td><?php echo date("d F Y", strtotime($n->created_at)); ?></td>
                <td>{{$n->status}}</td>
                <td>{{$n->tagihan}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
    <br><br>
    <p>Menggunakan metode pembayaran:</p>
        <ol>
            <li>Bank Transfer : {{$n->nama_bank}}</li>
            <li>Nomor rekening : {{$n->nomor_rekening}}</li>
        </ol>
    <br><br><br><br><br><br><br><br><br>
    <p style="text-align: right"><?php echo date("d F Y", strtotime($n->updated_at)); ?></p>
    <br><br><br><br><br><br><br>
    <p style="text-align: right">()</p>

</body>
</html>
