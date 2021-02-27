@extends('dashboard.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Pendaftar</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Forms</li>
                              <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Form Validation</h4>
            <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form novalidate>
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Nama Lengkap <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="Nama lengkap wajib diisi"> </div>
                            {{-- <div class="form-control-feedback"><small>D</small></div> --}}
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="email" name="text" class="form-control" required data-validation-required-message="Email wajib di isi"> </div>
                            {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Nomor Telepon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="Nomor Telepon wajib diisi" placeholder="Nomor terhubung dengan whatsapp"> </div>
                            {{-- <div class="form-control-feedback"><small>D</small></div> --}}
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Nama Perusahaan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="Nama Perusahaan wajib diisi" placeholder="Nama Perusahaan Sekarang"> </div>
                            {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Alamat Perusahaan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Alamat Perusahaan"></textarea>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Jenis Perusahaan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option>Pilih Jenis Perusahaan</option>
                                    <option value="PNS">PNS</option>
                                    <option value="BUMN">BUMN</option>
                                    <option value="BUMD">BUMD</option>
                                    <option value="BLU">BLU</option>
                                    <option value="BLUD">BLUD</option>
                                    <option value="Perusahaan">Perusahaan</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Status<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option>Pilih Status</option>
                                    <option value="Penyedia">Penyedia</option>
                                    <option value="Pengguna">Pengguna</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h5>Membership <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option>Pilih Membership</option>
                                    <option value="1" {{ ($data == "1") ? 'selected' : '' }}>1 Bulan, Rp. 250.000,- (WhatsApp)</option>
                                    <option value="2" {{ ($data == "2") ? 'selected' : '' }}>3 Bulan, Rp. 600.000,- (WhatsApp)</option>
                                    <option value="3" {{ ($data == "3") ? 'selected' : '' }}>1 Jam, Rp. 1.500.000,- (Zoom)</option>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="text-xs-right">
                          <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
