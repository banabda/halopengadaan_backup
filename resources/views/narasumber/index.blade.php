@extends('dashboard.dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Narasumber</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Narasumber</li>
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
                <h5 class="box-title">List Data Narasumber</h5>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal1" style="float: right;"><i class="glyphicon glyphicon-plus"></i>Tambah Data Narasumber</button>

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

                      <a href="{{ url('admin/detail/'.$dt ->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-info-circle"></i> Detail</a>
                      <a href="{{ url('admin/edit/'.$dt ->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                      <a href="{{ url('admin/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Anda yakin mau menghapus data ini?')"><i class="fa fa-trash"></i> Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Narasumber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{route('narasumber.store') }}" method="POST">
          {{csrf_field()}}

          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input name="id" type="text" class="form-control" id="id" aria-describedby="id" placeholder="Id"  value="{{ old('id') }}">
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="nama"  value="{{ old('nama') }}">
            @if ($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="email"  value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input name="password" type="textarea" class="form-control" id="password" aria-describedby="password" placeholder="password" value="{{ old('password') }}">
          @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input name="alamat" type="text"  class="form-control" id="alamat" placeholder="alamat" value="{{ old('alamat') }}">
            @if ($errors->has('alamat'))
                <span class="text-danger">{{ $errors->first('alamat') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomor Hp</label>
            <input name="nomor_hp" type="text"  class="form-control" id="nomor_hp" placeholder="nomor_hp" value="{{ old('nomor_hp') }}">
            @if ($errors->has('nomor_hp'))
                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
            @endif
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



