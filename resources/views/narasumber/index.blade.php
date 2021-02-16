<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<br>
<div class="container">
<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1">Tambah Data Narasumber</button>
    </div>
    <br>
  <div class="card-body">
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

    <a href="{{ url('narasumber/detail/'.$dt ->id) }}" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i>Detail</a>
    <a href="{{ url('narasumber/edit/'.$dt ->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
    <a href="{{ url('narasumber/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
    </td>
  </tr>
@endforeach
</table>
</div>
</body>
</html>
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
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>
</html>

@extends('dashboard.dashboard')

@section('content')


@endsection

