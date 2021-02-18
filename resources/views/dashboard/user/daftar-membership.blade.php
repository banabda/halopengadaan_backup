@extends('dashboard.dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Form Wizard</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Forms</li>
                              <li class="breadcrumb-item active" aria-current="page">Form Wizard</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">

       <!-- Step wizard -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h4 class="box-title">Client Registration</h4>
            <h6 class="box-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website </a></h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body wizard-content">
              <form action="{{ route('user.dashboard.membership.save') }}" class="tab-wizard wizard-circle" method="POST">
                  @csrf
                  <!-- Step 1 -->
                  <h6>Data Diri</h6>
                  <section>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="nama_lengkap">Nama Lengkap :</label>
                                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="email">Email :</label>
                                  <input type="email" class="form-control" name="email" id="email"> </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="no_hp">No HP :</label>
                                  <input type="text" class="form-control" name="no_hp" id="no_hp">
                                </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="alamat_rumah">Alamat Rumah :</label>
                                  <textarea name="alamat_rumah" id="alamat_rumah" rows="2" class="form-control"></textarea>
                          </div>
                      </div>
                  </section>
                  <!-- Step 2 -->
                  <h6>Pilih Paket</h6>
                  <section>
                      <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                                <label for="membership">Membership :</label>
                                <select class="custom-select form-control" id="membership" name="paket">
                                    <option>Pilih Membership</option>
                                    <option value="1">1 Bulan, (Rp. 250,000,-)</option>
                                    <option value="2">3 Bulan, (Rp. 600,000,-)</option>
                                    <option value="3">1 Jam, (Rp. 1.500.00,-)</option>
                                </select>
                            </div>
                          </div>
                      </div>
                      <div class="box" style="display: none" id="card_kelebihan_paket">
                        <div class="box-body">
                          <h3>Kelebihan</h3>
                          <ul id="kelebihan_paket">

                          </ul>
                        </div>
                      </div>
                  </section>
                  <!-- Step 3 -->
                  <h6>Pilih Pembayaran</h6>
                  <section>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="int123">Pilih Metode :</label>
                                  <input type="text" class="form-control" id="int123">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="int234">Pilih Providers :</label>
                                <input type="text" class="form-control" id="int234" placeholder="" value="23124567854356">
                            </div>
                          </div>
                      </div>
                  </section>
              </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
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
                    <li>Konsultasi Langsung via Zoom</li>
                `);
            }
            else {
                $('#card_kelebihan_paket').hide();
            }
        });
    });
</script>
@endsection
