  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Basic Box</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Box Cards</li>
                              <li class="breadcrumb-item active" aria-current="page">Basic Box</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="col-lg-12 col-12">
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

                        <button class="btn btn-primary" data-toggle="modal" data-target="#pembayaran-{{ $invoice->id }}">Konfirmasi Pembayaran</button>
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
        </div>
      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
