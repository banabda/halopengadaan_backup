@extends('dashboard.dashboard')
@section('content')

<<<<<<< HEAD
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
=======
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
>>>>>>> e1244055e4bd325479624170e351fb33c556b8ea
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
<<<<<<< HEAD
                  <h3 class="page-title">Data Narasumber</h3>
=======
                  <h3 class="page-title">Data Users</h3>
>>>>>>> e1244055e4bd325479624170e351fb33c556b8ea
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
<<<<<<< HEAD
                              <li class="breadcrumb-item active" aria-current="page">Data Narasumber</li>
=======
                              <li class="breadcrumb-item active" aria-current="page">Data Users</li>
>>>>>>> e1244055e4bd325479624170e351fb33c556b8ea
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
<<<<<<< HEAD
                <h5 class="box-title">List Data Narasumber</h5>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal1" style="float: right;">Tambah Data Narasumber</button>

              </div>
              <!-- /.box-header -->
              <div class="box-body">

                  <div class="table-responsive" style="padding-top: 10px;">
                    <table class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>Nomor Hp</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->password}}</td>
                            <td>{{$dt->alamat}}</td>
                            <td>{{$dt->nomor_hp}}</td>
                        <td>

                      <a href="{{ url('narasumber/detail/'.$dt ->id) }}" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                      <a href="{{ url('narasumber/edit/'.$dt ->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                      <a href="{{ url('narasumber/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
=======
                {{-- <h3 class="box-title">Data Table With Full Features</h3> --}}
                <a href="{{ route('user.create') }}"><button type="button" class="btn btn-outline btn-primary mb-5">New User</button></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableUser" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Alamat</th>
                              <th>Nomor Hp</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
>>>>>>> e1244055e4bd325479624170e351fb33c556b8ea

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Alamat</th>
                              <th>Nomor Hp</th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>

<<<<<<< HEAD
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Narasumber</h5>
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
        <form action="{{route('narasumber.create') }}" method="POST">
          {{csrf_field()}}

          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="id" aria-describedby="id" placeholder="Id"  value="{{ old('id') }}">
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="nama"  value="{{ old('nama') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="email"  value="{{ old('email') }}">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input name="password" type="textarea" class="form-control" id="password" aria-describedby="password" placeholder="password" value="{{ old('password') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input name="alamat" type="text"  class="form-control" id="alamat" placeholder="alamat" value="{{ old('alamat') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Hp</label>
            <input name="nomor_hp" type="text"  class="form-control" id="nomor_hp" placeholder="nomor_hp" value="{{ old('nomor_hp') }}">
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


=======
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
>>>>>>> e1244055e4bd325479624170e351fb33c556b8ea

