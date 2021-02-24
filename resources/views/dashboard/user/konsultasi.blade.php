@extends('dashboard.dashboard')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Konsultasi Sekarang</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Konsultasi</li>
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
                    <h3 class="alert-heading text-warning mt-3">🙋‍♂️Yeay!🙋‍♀️</h3>
                    <p>Sekarang Anda Dapat Melakukan Konsultasi Dengan Para Pakar Kami</p>

                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 text-center border border-info rounded shadow p-3 mb-4">
                        <center><img src="{{asset('images/whatsapp/samping.png')}}" alt="BANK MANDIRI" width="50%" height="200px" class="mr-2"></center>
                        <a target="_blank" class="mt-2" href="https://wa.me/{{ $phone }}" style="color: #007bff!important"><h5><strong>https://wa.me/{{ $phone }}</strong></h5></a>
                        </div>
                    </div>

                    {{-- <h1 class="mb-1 mt-3 text-warning font-weight-bold" id="waktu"></h1> --}}
                    {{-- <p class="mt-4">Bila tidak ada pembayaran, paket akan dibatalkan secara otomatis</p> --}}

                    <hr>

                    <a target="_blank" href="https://wa.me/{{ $phone }}">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#pembayaran">
                            Konsultasi Sekarang
                        </button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection
