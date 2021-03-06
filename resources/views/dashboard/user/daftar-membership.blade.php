@extends('dashboard.dashboard')
@section('content')
{{-- @php
    dd(($userhasPaket->expired_at <= Carbon\Carbon::now()  && $invoice->status == "Terkonfirmasi"));
@endphp --}}
@if (is_null($invoice) )

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Daftar Konsultasi</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pendaftaran Konsultasi</li>
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
                            <h4 class="box-title">Daftar Konsultasi</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" id="createUser" action="{{ route('user.dashboard.membership.save') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Data Diri</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="{{ Auth::user()->profile->nama_lengkap }}" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->profile->email }}" placeholder="E-mail" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >No HP</label>
                                            <input type="text" name="no_hp" class="form-control" value="{{ Auth::user()->profile->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="box-title text-info mt-2"><i class="ti-package mr-15"></i> Pemilihan Paket</h4>
                                <hr class="my-15">
                                <div class="form-group">
                                    <label for="membership">Pilih Paket</label>
                                    <select class="custom-select form-control" id="membership" name="paket" required>
                                        <option value="">Pilih Membership</option>
                                        <option value="2">5x Konsultasi / Bulan, (Rp. 250,000,-)</option>
                                        <option value="3">1 Jam via Zoom, (Rp. 1.500.000,-)</option>
                                    </select>
                                </div>

                                <div class="box" style="display: none" id="card_kelebihan_paket">
                                    <div class="box-body">
                                    <h3>Kelebihan</h3>
                                    <ul id="kelebihan_paket">

                                    </ul>
                                    </div>
                                </div>

                                <h4 class="box-title text-info mt-3"><i class="ti-money mr-15"></i> Pemilihan Pembayaran</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_method">Pilih Metode :</label>
                                            <select class="custom-select form-control" id="nama_method" name="nama_method" required>
                                                <option value="">Pilih Metode Pembayaran</option>
                                                @foreach ($metode_pembayaran as $key => $value)
                                                    <option value="{{ $key }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_provider">Pilih Providers :</label>
                                            <select class="custom-select form-control" id="nama_provider" name="nama_provider" required>
                                                <option value="">Pilih Providers</option>
                                            </select>
                                        </div>
                                    </div>
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

    <script>
        $(document).ready(function () {

            // Select Membership
            $('#membership').on('change', function () {
                var membership = $('#membership').val();

                if (membership == 1) {
                    $('#card_kelebihan_paket').show();
                    $('#kelebihan_paket').html('');
                    $('#kelebihan_paket').append(`
                        <li>Ditangani Para Ahli</li>
                        <li>Sumber Jawab Terkelola</li>
                        <li>Fast Response</li>
                        <li>Identitas Terjaga</li>
                    `);
                }
                else if (membership == 2) {
                    $('#card_kelebihan_paket').show();
                    $('#kelebihan_paket').html('');
                    $('#kelebihan_paket').append(`
                        <li>Ditangani Para Ahli</li>
                        <li>Sumber Jawab Terkelola</li>
                        <li>Fast Response</li>
                        <li>Identitas Terjaga</li>
                        <li>Harga Lebih Murah</li>
                    `);
                }
                else if (membership == 3) {
                    $('#card_kelebihan_paket').show();
                    $('#kelebihan_paket').html('');
                    $('#kelebihan_paket').append(`
                        <li>Ditangani Para Ahli</li>
                        <li>Sumber Jawab Terkelola</li>
                        <li>Fast Response</li>
                        <li>Identitas Terjaga</li>
                        <li>Konsultasi langsung via Zoom</li>
                    `);
                }
                else {
                    $('#card_kelebihan_paket').hide();
                }
            });

            // Select Payment Method
            $('#nama_method').on('change', function () {
                var nama_metode = $('#nama_method').val();
                // console.log(nama_metode);
                if (nama_metode == nama_metode) {
                    console.log("Berhasil");
                    getProviders(nama_metode);
                }
                else {
                    $('#nama_provider').html();
                }
            });


        });

        function getProviders(nama_metode) {
            $.ajax({
                type: "GET",
                url: "{{ url ('user/getProviders') }}/" + nama_metode,
                dataType: "JSON",
                success: function (response) {
                    $('#nama_provider').empty();
                    $.each(response, function (key, value) {
                        $('#nama_provider').append('<option value="'+ value +'">'+ value +'</option>');
                    });
                    $('#nama_provider').selectpicker('refresh');
                }
            });
        }
    </script>
@elseif(!is_null($userhasPaket) && !is_null($invoice))
    @if ($userhasPaket->expired_at <= Carbon\Carbon::now()  && $invoice->status == "Terkonfirmasi")
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Daftar Konsultasi</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pendaftaran Konsultasi</li>
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
                                <h4 class="box-title">Daftar Konsultasi</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" id="createUser" action="{{ route('user.dashboard.membership.save') }}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Data Diri</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap" value="{{ Auth::user()->profile->nama_lengkap }}" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->profile->email }}" placeholder="E-mail" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >No HP</label>
                                                <input type="text" name="no_hp" class="form-control" value="{{ Auth::user()->profile->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="box-title text-info mt-2"><i class="ti-package mr-15"></i> Pemilihan Paket</h4>
                                    <hr class="my-15">
                                    <div class="form-group">
                                        <label for="membership">Pilih Paket</label>
                                        <select class="custom-select form-control" id="membership" name="paket" required>
                                            <option value="">Pilih Membership</option>
                                            <option value="2">5x Konsultasi / Bulan, (Rp. 250,000,-)</option>
                                            <option value="3">1 Jam via Zoom, (Rp. 1.500.000,-)</option>
                                        </select>
                                    </div>

                                    <div class="box" style="display: none" id="card_kelebihan_paket">
                                        <div class="box-body">
                                        <h3>Kelebihan</h3>
                                        <ul id="kelebihan_paket">

                                        </ul>
                                        </div>
                                    </div>

                                    <h4 class="box-title text-info mt-3"><i class="ti-money mr-15"></i> Pemilihan Pembayaran</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_method">Pilih Metode :</label>
                                                <select class="custom-select form-control" id="nama_method" name="nama_method" required>
                                                    <option value="">Pilih Metode Pembayaran</option>
                                                    @foreach ($metode_pembayaran as $key => $value)
                                                        <option value="{{ $key }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_provider">Pilih Providers :</label>
                                                <select class="custom-select form-control" id="nama_provider" name="nama_provider" required>
                                                    <option value="">Pilih Providers</option>
                                                </select>
                                            </div>
                                        </div>
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

        <script>
            $(document).ready(function () {

                // Select Membership
                $('#membership').on('change', function () {
                    var membership = $('#membership').val();

                    if (membership == 1) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                        `);
                    }
                    else if (membership == 2) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                            <li>Harga Lebih Murah</li>
                        `);
                    }
                    else if (membership == 3) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                            <li>Konsultasi langsung via Zoom</li>
                        `);
                    }
                    else {
                        $('#card_kelebihan_paket').hide();
                    }
                });

                // Select Payment Method
                $('#nama_method').on('change', function () {
                    var nama_metode = $('#nama_method').val();
                    // console.log(nama_metode);
                    if (nama_metode == nama_metode) {
                        console.log("Berhasil");
                        getProviders(nama_metode);
                    }
                    else {
                        $('#nama_provider').html();
                    }
                });


            });

            function getProviders(nama_metode) {
                $.ajax({
                    type: "GET",
                    url: "{{ url ('user/getProviders') }}/" + nama_metode,
                    dataType: "JSON",
                    success: function (response) {
                        $('#nama_provider').empty();
                        $.each(response, function (key, value) {
                            $('#nama_provider').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                        $('#nama_provider').selectpicker('refresh');
                    }
                });
            }
        </script>
    @elseif ($userhasPaket->saldo == 0 && $userhasPaket->paket == 2 && $invoice->status == "Terkonfirmasi")
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Daftar Konsultasi</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pendaftaran Konsultasi</li>
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
                                <h4 class="box-title">Daftar Konsultasi</h4>
                            </div>
                            <!-- /.box-header -->
                            <form class="form" id="createUser" action="{{ route('user.dashboard.membership.save') }}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Data Diri</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap" value="{{ Auth::user()->profile->nama_lengkap }}" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->profile->email }}" placeholder="E-mail" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >No HP</label>
                                                <input type="text" name="no_hp" class="form-control" value="{{ Auth::user()->profile->no_hp }}" placeholder="Terhubung dengan WhatsApp (6285683xxx)">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="box-title text-info mt-2"><i class="ti-package mr-15"></i> Pemilihan Paket</h4>
                                    <hr class="my-15">
                                    <div class="form-group">
                                        <label for="membership">Pilih Paket</label>
                                        <select class="custom-select form-control" id="membership" name="paket" required>
                                            <option value="">Pilih Membership</option>
                                            <option value="2">5x Konsultasi / Bulan, (Rp. 250,000,-)</option>
                                            <option value="3">1 Jam via Zoom, (Rp. 1.500.000,-)</option>
                                        </select>
                                    </div>

                                    <div class="box" style="display: none" id="card_kelebihan_paket">
                                        <div class="box-body">
                                        <h3>Kelebihan</h3>
                                        <ul id="kelebihan_paket">

                                        </ul>
                                        </div>
                                    </div>

                                    <h4 class="box-title text-info mt-3"><i class="ti-money mr-15"></i> Pemilihan Pembayaran</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_method">Pilih Metode :</label>
                                                <select class="custom-select form-control" id="nama_method" name="nama_method" required>
                                                    <option value="">Pilih Metode Pembayaran</option>
                                                    @foreach ($metode_pembayaran as $key => $value)
                                                        <option value="{{ $key }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_provider">Pilih Providers :</label>
                                                <select class="custom-select form-control" id="nama_provider" name="nama_provider" required>
                                                    <option value="">Pilih Providers</option>
                                                </select>
                                            </div>
                                        </div>
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

        <script>
            $(document).ready(function () {

                // Select Membership
                $('#membership').on('change', function () {
                    var membership = $('#membership').val();

                    if (membership == 1) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                        `);
                    }
                    else if (membership == 2) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                            <li>Harga Lebih Murah</li>
                        `);
                    }
                    else if (membership == 3) {
                        $('#card_kelebihan_paket').show();
                        $('#kelebihan_paket').html('');
                        $('#kelebihan_paket').append(`
                            <li>Ditangani Para Ahli</li>
                            <li>Sumber Jawab Terkelola</li>
                            <li>Fast Response</li>
                            <li>Identitas Terjaga</li>
                            <li>Konsultasi langsung via Zoom</li>
                        `);
                    }
                    else {
                        $('#card_kelebihan_paket').hide();
                    }
                });

                // Select Payment Method
                $('#nama_method').on('change', function () {
                    var nama_metode = $('#nama_method').val();
                    // console.log(nama_metode);
                    if (nama_metode == nama_metode) {
                        console.log("Berhasil");
                        getProviders(nama_metode);
                    }
                    else {
                        $('#nama_provider').html();
                    }
                });


            });

            function getProviders(nama_metode) {
                $.ajax({
                    type: "GET",
                    url: "{{ url ('user/getProviders') }}/" + nama_metode,
                    dataType: "JSON",
                    success: function (response) {
                        $('#nama_provider').empty();
                        $.each(response, function (key, value) {
                            $('#nama_provider').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                        $('#nama_provider').selectpicker('refresh');
                    }
                });
            }
        </script>
    @else
        @include('dashboard.user.invoice-user')
    @endif
@else
    @include('dashboard.user.invoice-user')
@endif

  <!-- Modal -->
  <div class="modal center-modal fade" id="modalNotification" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
            <i data-feather="info"></i> &nbsp;
            <h4 style="margin-top: 1.51px"> Pemberitahuan:</h4>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Sisa Kesempatan Chat Anda Tersisa : 0</p>
          <p>Silahkan Membeli Paket Kembali Agar Dapat Berkonsultasi dengan Para Pakar</p>
        </div>
        {{-- <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-rounded btn-primary float-right">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
<!-- /.modal -->

@endsection
