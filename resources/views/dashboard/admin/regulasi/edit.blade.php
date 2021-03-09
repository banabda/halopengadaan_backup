@extends('dashboard.dashboard')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Edit Regulasi</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Regulasi</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Regulasi</li>
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
                    <h4 class="box-title">Edit Regulasi</h4>
                  </div>
                  <!-- /.box-header -->
                  <form class="form" id="createRegulasi" action="{{ route('regulasi.update', $regulasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                      <div class="box-body">
                          <hr class="my-15">
                            <div class="form-group">
                                <label>Nama Regulasi</label>
                                <input type="text" class="form-control" id="judul" name="nama_regulasi" value="{{ $regulasi->nama_regulasi }}" placeholder="Nama Regulasi">
                            </div>
                            <div class="form-group">
                                <label>Dokumen Regulasi</label>
                                <input type="file" class="form-control" name="dokumen">
                            </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{ route('regulasi.index') }}"><button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                            <i class="ti-trash"></i> Cancel
                          </button></a>
                          <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Publish
                          </button>
                      </div>
                  </form>
                </div>
          </div>
      </section>
    </div>
</div>

@endsection
