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


<!-- Content Wrapper. Contains page content -->
  <div class="container">

   <!-- Main content -->
<section class="content">

@foreach($metodepembayaran as $metodepembayaran)

<form action="{{route('metodepembayaran.updatemethod') }}" method="post">
  {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $metodepembayaran->id }}"> <br/>
       {{-- <div class="form-group">
           <label for="exampleInputPassword1">Id</label>
       <br><input type="text" class="form-control" required="required" name="id" value="{{ $metodepembayaran->id }}"><br/>
       </div> --}}
    <div class="table-responsive" style="padding-top: 50px;">
       <div class="form-group">
           <label for="exampleInputPassword1">Nama Metode</label>
       <br><input type="text" class="form-control" required="required" name="nama_method" value="{{ $metodepembayaran->nama_method }}"><br/>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nama Bank</label>
       <br><input type="text" class="form-control" required="required" name="nama_provider" value="{{ $metodepembayaran->nama_provider }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nama Pemilik Rekening</label>
       <br><input type="text" class="form-control" required="required" name="nama_rekening" value="{{ $metodepembayaran->nama_rekening }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nomor Rekening</label>
       <br><input type="text" class="form-control" required="required" name="nomor_rekening" value="{{ $metodepembayaran->nomor_rekening }}"> <br/></div><br>
       <div class="modal-footer">
       <a href="/admin/metode-pembayaran" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
       <input type="submit" class="btn btn-primary" value="Simpan Data">
    </div>
</form>

@endforeach


 </section>
     <!-- /.content -->
 </div>
   <!-- /.content-wrapper -->

</body>
</html>
