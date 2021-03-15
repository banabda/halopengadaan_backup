  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      @include('dashboard.user.content-header')

      <!-- Main content -->
      <section class="content">
        <div class="col-lg-12 col-12">
            @if ($invoice->status == "Menunggu Pembayaran")
                <!-- /.box-header -->
                <div class="alert bg-white shadow-lg border-0 rounded-lg mt-3" role="alert">
                    <div class="row text-center">
                        <div class="col-lg-12">
                        <h3 class="alert-heading text-warning mt-3">Selesaikan Pembayaran Anda!</h3>
                        <p>Mohon lakukan pembayaran sejumlah <b>Rp{{ number_format($invoice->tagihan,0,"",".") }}</b> sebelum <strong>{{ Carbon\Carbon::parse($invoice->expired_at)->translatedFormat('l, j F Y H:i') }}</strong> ke rekening berikut:</p>

                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 text-center border border-info rounded shadow p-3 mb-4">
                            <h5><img src="{{asset('images/bank/'.$invoice->nama_bank .'.png')}}" alt="{{ $invoice->nama_bank }}" width="150" height="auto" class="mr-2 mb-3"><br>No. Rek.
                                <strong id="rekening">{{ $invoice->nomor_rekening }}</strong>
                                <button class="btn btn-primary btn-xs ml-2" id="salin_rekening" onclick="copy_rekening()" role="button">Salin Rekening</button></h5>
                            <h5>Atas Nama: <br/><strong>Lembaga Pengembangan dan Konsultasi Nasional</strong></h5>
                            </div>
                        </div>

                        <h1 class="mb-1 mt-3 text-warning font-weight-bold" id="waktu-{{ $invoice->id }}"></h1>
                        <p class="mt-4">Bila tidak ada pembayaran, paket akan dibatalkan secara otomatis</p>

                        <hr>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#pembayaran">Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Set the date we're counting down to
                    var countDownDate{{ $invoice->id }} = new Date("{{ $invoice->expired_at }}").getTime();

                    // Update the count down every 1 second
                    var x{{ $invoice->id }} = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate{{ $invoice->id }} - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000) < 10 ? '0'+Math.floor((distance % (1000 * 60)) / 1000) : Math.floor((distance % (1000 * 60)) / 1000);

                        // Display the result in the element with id="demo"
                        document.getElementById("waktu-{{ $invoice->id }}").innerHTML = hours + ":"
                        + minutes + ":" + seconds;

                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(x{{ $invoice->id }});
                            document.getElementById("waktu-{{ $invoice->id }}").innerHTML = "EXPIRED";
                        }
                    }, 1000);
                </script>
            @elseif($invoice->status == "Telah Terbayar")
                <div class="alert alert-info shadow-lg border-0 rounded-lg mt-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading mt-3">Bukti Pembayaran Anda Berhasil Kami Terima!</h3>
                    <span>Dalam waktu 2 hari kerja admin kami akan mengkonfirmasi bukti pembayaran yang Anda kirimkan</span>
                </div>
            @elseif($invoice->status == "Terkonfirmasi")
             <div class="jumbotron jumbotron-fluid bg-success">
                <div class="container">
                  <h1 class="display-4" style="text-align: center">Yeay! Pembayaran Terkonfirmasi!</h1>
                  <p class="lead mt-4" style="text-align: center">Sekarang Anda Dapat Melakukan Konsultasi Langsung Dengan Para Pakar Dengan Menggunakan Menu <b>Konsultasi Sekarang</b> Pada Samping Kiri</p>
                </div>
             </div>
            @endif

        </div>
      </section>
      <!-- /.content -->
    </div>
</div>
<!-- MODAL -->
<div class="modal fade shadow shadow-lg" id="pembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Upload Bukti Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h6 class="mb-4">Silahkan transfer sejumlah <b> Rp. {{ number_format($invoice->tagihan,0,"",".") }} </b> ke rekening berikut :</h6>
            <div class="row">
                <div class="col-lg-12 text-center border border-info rounded shadow p-3 mb-4">
                <h5><img src="{{asset('images/bank/'.$invoice->nama_bank .'.png')}}" alt="logo BRI" width="150" height="auto" class="mr-2 mb-3">
                    <br>No. Rek.
                    <strong id="rekening">{{ $invoice->nomor_rekening }}</strong>
                </h5>
                <h5>Atas Nama: <br/><strong>Lembaga Pengembangan dan Konsultasi Nasional</strong></h5>
                </div>
            </div>
            <br/>
            <form action="{{ route('user.dashboard.saveBuktiPembayaran') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $invoice->id }}">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <strong>Nama Pemilik Rekening<span style="color: red">*</span></strong>
                            <input type="text" id="name" name="nama_rekening" class="form-control input-lg" value="{{ old('name') }}" required>
                            <small>Nama Pemilik Rekening Pada Saat Transfer Sesuai Buku Tabungan</small>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <strong>Upload Bukti<span style="color: red">*</span></strong>
                            <input id="brosurFile" type="file" name="bukti_pembayaran" class="form-control" required>
                            <small>Max 2 Mb</small>
                            @if($errors->has('brosur'))
                                <div class="text-danger">
                                    {{ $errors->first('brosur')}}
                                </div>
                            @endif
                        </div>
                        <img id="brosur_placeholder" width="20%" height="auto" />
                    </div>
                </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        </div>
    </div>
    </div>
</div>
<!-- /.content-wrapper -->
<script>
    function copy_rekening() {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($('#rekening').text()).select();
      document.execCommand("copy");
      $temp.remove();
      $('#salin_rekening')
        .attr('data-toggle', 'tooltip')
        .attr('data-placement', 'top')
        .attr('title', 'Nomor rekening disalin')
        .tooltip('show')
        .removeAttr('data-toggle')
        .removeAttr('data-placement')
        .removeAttr('title')
        .removeAttr('data-orignial-title');
    }
</script>
