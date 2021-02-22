@extends('dashboard.dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Metode Pembayaran</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Metode Pembayaran</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h5 class="box-title">List Metode Pembayaran</h5>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal1" style="float: right;"><i class="glyphicon glyphicon-plus"></i>Tambah Metode Pembayaran</button>

              </div>
              <!-- /.box-header -->
              <div class="box-body">

                  <div class="table-responsive" style="padding-top: 10px;">
                    <table class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Metode</th>
                            <th>Nama Bank</th>
                            <th>Nama Pemilik Rekening</th>
                            <th>Nomor Rekening</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $mt)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mt->nama_method}}</td>
                            <td>{{$mt->nama_provider}}</td>
                            <td>{{$mt->nama_rekening}}</td>
                            <td>{{$mt->nomor_rekening}}</td>

                        <td>

                      <a href="{{ url('admin/detailmethod/'.$mt ->id) }}" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                      <a href="{{ url('admin/editmethod/'.$mt ->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                      <a href="{{ url('admin/deletemethod/'.$mt->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- menampilkan error validasi --}}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif

      <div class="modal-body">
        <form action="{{route('metodepembayaran.store') }}" method="POST">
          @csrf

          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="id" aria-describedby="id" placeholder="Id"  value="{{ old('id') }}">
          </div>  --}}
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Metode</label>
            <input name="nama_method" type="text" class="form-control" id="nama_method" aria-describedby="nama_method" placeholder="nama method"  value="{{ old('nama_method') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Bank</label>
            <input name="nama_provider" type="text" class="form-control" id="nama_provider" aria-describedby="nama_provider" placeholder="nama provider"  value="{{ old('nama_provider') }}">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Nama Pemilik Rekening</label>
          <input name="nama_rekening" type="text" class="form-control" id="nama_rekening" aria-describedby="nama_rekening" placeholder="nama rekening" value="{{ old('nama_rekening') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Rekening</label>
            <input name="nomor_rekening" type="text"  class="form-control" id="nomor_rekening" placeholder="nomor rekening" value="{{ old('nomor_rekening') }}">
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>

@endsection



