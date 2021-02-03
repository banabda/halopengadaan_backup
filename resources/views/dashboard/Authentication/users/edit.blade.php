@extends('dashboard.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Edit User</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">

          <div class="col-lg-12 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Edit User</h4>
                  </div>
                  <!-- /.box-header -->
                  <form class="form" id="editUser" action="{{ route('user.update', $data->id) }}">
                    @method('PATCH')
                      <div class="box-body">
                          <h4 class="box-title text-info"><i class="ti-user mr-15"></i>Edit Data User</h4>
                          <hr class="my-15">
                          <div class="row">
                            <div class="col-md-6">

                              <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ $data->name }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ $data->email }}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>New Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <p id="message"></p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>New Konfirmasi Password</label>
                                <input type="password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password">
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{ route('user.index') }}"><button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                            <i class="ti-trash"></i> Cancel
                          </button></a>
                          <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                          </button>
                      </div>
                  </form>
                </div>
          </div>
      </section>
    </div>
</div>

<script>
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Password Cocok').css('color', 'green');
        } else
            $('#message').html('Password Tidak Sama').css('color', 'red');
    });

    $('#editUser').on('submit', function(event){

    // check if the input is valid using a 'valid' property
    if ($('#password').val() !== $('#confirm_password').val()) return false;

    event.preventDefault();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $(this).attr("action"),
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: (data) => {
            window.location.href = '{{ route("user.index") }}';
        },

        error: (data) => {

        }
    });
    });
</script>
@endsection
