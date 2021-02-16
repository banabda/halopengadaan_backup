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
<div class="content-wrapper">

   <!-- Main content -->
   <section class="container">

     <!-- Default box -->
     <div class="card">
       <div class="card-header">
       
         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
             <i class="fas fa-minus"></i></button>
           <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
             <i class="fas fa-times"></i></button>
         </div>
       </div>
       <div class="card-body">
@foreach($narasumber as $narasumber)

<form action="" method="POST">
  {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $narasumber->id }}"> <br/>
       <!-- <div class="form-group">
           <label for="exampleInputPassword1">Id</label>
       <br><input type="text" class="form-control"  name="id" value="{{ $narasumber->id }}" readonly><br/>
       </div> -->
       <div class="form-group">
           <label for="exampleInputPassword1">Nama</label>
       <br><input type="text" class="form-control" name="nama" value="{{ $narasumber->nama }}" readonly> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Email</label>
       <br><input type="text" class="form-control"  name="email" value="{{ $narasumber->email }}" readonly=""> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
       <br><input type="text" class="form-control"  name="password" value="{{ $narasumber->password }}" readonly=""> <br/></div>
       <div class="form-group">
       <div class="form-group">
           <label for="exampleInputPassword1">Alamat</label>
       <br><input type="text" class="form-control"  name="alamat" value="{{ $narasumber->alamat }}" readonly=""> <br/></div>
           <label for="exampleInputPassword1">Nomor Hp</label>
       <br><input type="text" class="form-control" required="required" name="nomor_hp" value="{{ $narasumber->nomor_hp }}" readonly><br/></div><br>
       <div class="modal-footer">
       <a href="/narasumber" type="button" class="btn btn-primary" data-dismiss="modal">Kembali</a>
       <br>
       </form>  

@endforeach 
         </div>
       
   </div>
       <!-- /.card -->
 </section>
     <!-- /.content -->
 </div>
   <!-- /.content-wrapper -->

</body>
</html>