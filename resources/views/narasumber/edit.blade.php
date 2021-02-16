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
@foreach($narasumber as $narasumber)

<form action="{{route('narasumber.update') }}" method="post">
  {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $narasumber->id }}"> <br/>
       <!-- <div class="form-group">
           <label for="exampleInputPassword1">Id</label>
       <br><input type="text" class="form-control" required="required" name="id" value="{{ $narasumber->id }}"><br/>
       </div> -->
       <div class="form-group">
           <label for="exampleInputPassword1">Nama</label>
       <br><input type="text" class="form-control" required="required" name="nama" value="{{ $narasumber->nama }}"><br/>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Email</label>
       <br><input type="text" class="form-control" required="required" name="email" value="{{ $narasumber->email }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
       <br><input type="text" class="form-control" required="required" name="password" value="{{ $narasumber->password }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Alamat</label>
       <br><input type="text" class="form-control" required="required" name="alamat" value="{{ $narasumber->alamat }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nomor Hp</label>
       <br><input type="text" class="form-control" required="required" name="nomor_hp" value="{{ $narasumber->nomor_hp }}"> <br/></div><br>
       <div class="modal-footer">
       <a href="/narasumber" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>       
       <input type="submit" class="btn btn-primary" value="Simpan Data">
  </form>  
@endforeach 
       
 </section>
     <!-- /.content -->
 </div>
   <!-- /.content-wrapper -->

</body>
</html> 