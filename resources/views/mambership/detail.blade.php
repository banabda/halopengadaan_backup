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

@foreach($mambership as $mambership)

<form action="" method="POST">
  {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $mambership->id }}"> <br/>
       <!-- <div class="form-group">
           <label for="exampleInputPassword1">Id</label>
       <br><input type="text" class="form-control"  name="id" value="{{ $mambership->id }}" readonly><br/>
       </div> -->

       <div class="table-responsive" style="padding-top: 50px;">
       <div class="form-group">
           <label for="exampleInputPassword1">Nama lengkap</label>
       <br><input type="text" class="form-control" name="nama_lengkap" value="{{ $mambership->nama_lengkap }}" readonly> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Email</label>
       <br><input type="text" class="form-control"  name="email" value="{{ $mambership->email }}" readonly=""> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nomer Whatsapp</label>
       <br><input type="text" class="form-control"  name="no_wa" value="{{ $mambership->no_wa }}" readonly=""> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Tempat kerja</label>
       <br><input type="text" class="form-control"  name="tempat_kerja" value="{{ $mambership->tempat_kerja }}" readonly=""> <br/></div>
       <div class="form-group">
            <label for="exampleInputPassword1">Jenis</label>
       <br><input type="text" class="form-control"  name="jenis" value="{{ $mambership->jenis }}" readonly=""> <br/></div>
       <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
       <br><input type="text" class="form-control"  name="status" value="{{ $mambership->status }}" readonly=""> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Mambership</label>
       <br><input type="text" class="form-control" required="required" name="mambership" value="{{ $mambership->mambership }}" readonly><br/></div><br>
       <div class="modal-footer">
       <a href="/mambership" type="button" class="btn btn-primary" data-dismiss="modal">Kembali</a>
       <br>
       </div>

</form>

@endforeach

 </section>
     <!-- /.content -->
 </div>
   <!-- /.content-wrapper -->

</body>
</html>
