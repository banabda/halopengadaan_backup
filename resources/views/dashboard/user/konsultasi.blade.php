@extends('dashboard.dashboard')
@section('content')
@if ($userHasPaket->paket == "3")
    @if (is_null($message))
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
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Konsultasi via Zoom</h4>
                                <p>Ceritakan permasalahanmu, team admin akan mencari pakar yang cocok untuk permasalahan anda</p>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" id="createUser" action="{{ route('user.dashboard.konsultasi.zoom') }}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info"><i class="ti-clipboard mr-15"></i> Permasalahan Kamu</h4>
                                    <hr class="my-15">
                                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label >Judul Permasalahan</label>
                                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Permasalahanmu">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsikan Permasalahan </label>
                                            <textarea name="message" id="deskripsi" class="form-control" rows="4" placeholder="Deskripsikan Permasalahanmu"></textarea>
                                        </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-right">
                                    <a href="{{ route('user.index') }}"><button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                        <i class="ti-trash"></i> Cancel
                                    </button></a>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
            </section>
            </div>
        </div>
    @else
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
                    <div class="jumbotron jumbotron-fluid bg-primary">
                        <div class="container">
                        <h1 class="display-4" style="text-align: center">Pesan Permasalahanmu Sudah Terkirim!</h1>
                        <p class="lead mt-4" style="text-align: center">Mohon Menunggu, Anda Akan Dihubungi Oleh Admin Kami Untuk Konsultasi via Zoom. Terima Kasih!</p>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    @endif

@else
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
                            <a target="_blank" class="mt-2" href="https://wa.me/6285691166309" style="color: #007bff!important"><h5><strong>https://wa.me/6285691166309</strong></h5></a>
                            </div>
                        </div>

                        {{-- <h1 class="mb-1 mt-3 text-warning font-weight-bold" id="waktu"></h1> --}}
                        {{-- <p class="mt-4">Bila tidak ada pembayaran, paket akan dibatalkan secara otomatis</p> --}}

                        <hr>

                        <a target="_blank" href="https://wa.me/6285691166309">
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
@endif

@endsection
