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

<form action="{{route('mambership.updatemamber') }}" method="post">
  {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $mambership->id }}"> <br/>
        {{-- <div class="form-group">
           <label for="exampleInputPassword1">Id</label>
       <br><input type="text" class="form-control" required="required" name="id" value="{{ $mambership->id }}"><br/>
       </div>  --}}
    <div class="table-responsive" style="padding-top: 50px;">
       <div class="form-group">
           <label for="exampleInputPassword1">Nama lengkap</label>
       <br><input type="text" class="form-control" required="required" name="nama_lengkap" value="{{ $mambership->nama_lengkap }}"><br/>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Email</label>
       <br><input type="text" class="form-control" required="required" name="email" value="{{ $mambership->email }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Nomer Whatsapp</label>
       <br><input type="text" class="form-control" required="required" name="no_wa" value="{{ $mambership->no_wa }}"> <br/></div>
       <div class="form-group">
           <label for="exampleInputPassword1">Tempat kerja</label>
       <br><input type="text" class="form-control" required="required" name="tempat_kerja" value="{{ $mambership->tempat_kerja }}"> <br/></div>
       <div class="form-group">
            <label for="exampleInputPassword1">Jenis</label>
            <br><select type="text" class="form-control" required="required" name="jenis">
                    <option value="PNS" @if ($mambership->jenis == "PNS") {{ 'selected' }} @endif>PNS</option>
                    <option value="BUMN" @if ($mambership->jenis == "BUMN") {{ 'selected' }} @endif>BUMN</option>
                    <option value="BLU" @if ($mambership->jenis == "BLU") {{ 'selected' }} @endif>BLU</option>
                    <option value="BLUD" @if ($mambership->jenis == "BLUD") {{ 'selected' }} @endif>BLUD</option>
                    <option value="PERUSAHAAN" @if ($mambership->jenis == "PERUSAHAAN") {{ 'selected' }} @endif>PERUSAHAAN</option>
                </select>
            <br/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <br><select type="text" class="form-control" required="required" name="status">
                    <option value="Penyedia"  @if ($mambership->status == "Penyedia") {{ 'selected' }} @endif>Penyedia</option>
                    <option value="Pengguna"  @if ($mambership->status == "Pengguna") {{ 'selected' }} @endif>Pengguna</option>
                </select>
            <br/>
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Mambership</label>
       <br><select type="text" class="form-control" required="required" name="mambership">
                    <option value="1 Bulan, Rp.250.000,-" @if ($mambership->mambership == "1 Bulan, Rp.250.000,-") {{ 'selected' }} @endif>1 Bulan, Rp.250.000,-</option>
                    <option value="3 Bulan, Rp.600.000,-"  @if ($mambership->mambership == "3 Bulan, Rp.600.000,-") {{ 'selected' }} @endif>3 Bulan, Rp.600.000,-</option>
            </select>
       <br/>
       </div><br>
       <div class="modal-footer">
       <a href="/admin/memberadmin" type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
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
