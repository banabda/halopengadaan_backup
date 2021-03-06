<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halo Pengadaan Invoice</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
  <div class="row">
    <center>
		<h4>HALO PENGADAAN
            <br> LEMBAGA PENGEMBANGAN DAN KONSULTASI NASIONAL
        </h4> <hr/ style="border:0.5px solid black;">
    </center>

    <center><h4 style="float: right;"> INVOICE </h4></center><br>
    <h5><b>Atas Nama : {{ $invoice->user->profile->nama_lengkap }}</b></h5>
    <br><br>

    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama Paket</th>
            <th>Total Pembayaran</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
			<tr>
				{{-- <td>{{ $i++ }}</td> --}}
				<td>
                    @if($invoice->paket == 1)
                        Silver
                    @elseif($invoice->paket == 2)
                        Gold
                    @else
                        Platinum
                    @endif
                </td>
				<td>Rp. {{ number_format($invoice->tagihan,2,",",".") }}</td>
				<td>
                    {{ Carbon\Carbon::parse($invoice->created_at)->translatedFormat('d F Y ') }}
                </td>
                <td>
                    @if ($invoice->status == "Menunggu Pembayaran")
                        Menunggu Pembayaran
                    @elseif($invoice->status == "Telah Terbayar")
                        Menunggu Konfirmasi
                    @else
                        Lunas
                    @endif
                    {{-- {{$invoice->status}} --}}
                </td>
                <td>Rp. {{ number_format($invoice->tagihan,2,",",".") }}</td>

			</tr>
        </tbody>
      </table>

      <p>Menggunakan Metode Pembayaran:</p>
        <ol>
            <li>Bank Transfer : {{ $invoice->nama_bank }}</li>
            <li>Nomor Rekening : {{ $invoice->nomor_rekening }}</li>
        </ol>
{{--
        <p>Pembayaran dapat dilakukan ke:</p>
        <ol>
            <li><p style="font-size: 12px;">Bank Rakyat Indonesia (BRI) <br> No. Rek : 213501000250301 <br> Atas Nama : Lembaga Pengembangan dan Konsultasi Nasional</p></li>
            <li>
                <p style="font-size: 12px;">Bank Mandiri <br> No. Rek : 0060010942294 <br> Atas Nama : Lembaga Pengembangan dan Konsultasi Nasional</p>
            </li>
        </ol> --}}

        {{-- <p style="text-align: right"></p>
        <br><br><br><br><br><br>
        <p style="text-align: right"><b>{{$nama_orang}}</b></p> --}}

        <div class="col-xs-4"></div>
        <div class="col-xs-4"></div>
        <div class="col-xs-3" style="padding-top: 10px;">
            <br><br><br><br>
            <center>
                Jakarta, {{ Carbon\Carbon::parse($invoice->created_at)->translatedFormat('d F Y ') }}
                {{-- <br><br><br><br>
                <br><b><u>Yenny Yulianty</u></b>
                <br>Keuangan LPKN --}}
            </center>
        </div>
  </div>
</div>

</body>
</html>
