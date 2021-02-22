@extends('dashboard.dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Mambership</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Mambership</li>
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
                <h5 class="box-title">List Data Mambership</h5>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal1" style="float: right;"><i class="glyphicon glyphicon-plus"></i>Tambah Data Mambership</button>

              </div>
              <!-- /.box-header -->
              <div class="box-body">

                  <div class="table-responsive" style="padding-top: 10px;">
                    <table class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama lengkap</th>
                            <th>Email</th>
                            <th>Nomer Whatsapp</th>
                            <th>Tempat kerja</th>
                            <th>Jenis</th>
                            <th>status</th>
                            <th>Mambership</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dt->nama_lengkap}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->no_wa}}</td>
                            <td>{{$dt->tempat_kerja}}</td>
                            <td>{{$dt->jenis}}</td>
                            <td>{{$dt->status}}</td>
                            <td>{{$dt->mambership}}</td>
                        <td>

                      <a href="{{ url('admin/detailmamber/'.$dt ->id) }}" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                      <a href="{{ url('admin/editmamber/'.$dt ->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                      <a href="{{ url('admin/deletemamber/'.$dt->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mambership</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{route('mambership.store') }}" method="POST">
            @csrf

          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="id" aria-describedby="id" placeholder="Id"  value="{{ old('id') }}">
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Nama lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="nama_lengkap"  value="{{ old('nama_lengkap') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="email"  value="{{ old('email') }}">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Nomer Whatsapp</label>
          <input name="no_wa" type="text" class="form-control" id="no_wa"   ="no_wa" placeholder="no_wa" value="{{ old('no_wa') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tempat kerja</label>
            <input name="tempat_kerja" type="text"  class="form-control" id="tempat_kerja" placeholder="tempat_kerja" value="{{ old('tempat_kerja') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis</label>
            <select name="jenis" type="text"  class="form-control" id="jenis" placeholder="jenis" value="{{ old('jenis') }}">
                <option value="pns">PNS</option>
                <option value="bumn">BUMN</option>
                <option value="blu">BLU</option>
                <option value="blud">BLUD</option>
                <option value="perusahaan">PERUSAHAAN</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select name="status" type="text"  class="form-control" id="status" placeholder="status" value="{{ old('status') }}">
                <option value="penyedia">Penyedia</option>
                <option value="pengguna">Pengguna</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mambership</label>
            <select name="mambership" type="text"  class="form-control" id="mambership" placeholder="mambership" value="{{ old('mambership') }}">
                <option value="1 Bulan, Rp.250.000,-">1 Bulan, Rp.250.000,-</option>
                <option value="3 Bulan, Rp.600.000,">3 Bulan, Rp.600.000,-</option>
            </select>
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



