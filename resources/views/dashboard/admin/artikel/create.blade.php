@extends('dashboard.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Buat Artikel</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Artikel</li>
                              <li class="breadcrumb-item active" aria-current="page">Buat Artikel</li>
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
                    <h4 class="box-title">Buat Artikel Baru</h4>
                  </div>
                  <!-- /.box-header -->
                  <form class="form" id="createUser" action="{{ route('user.store') }}">
                      <div class="box-body">
                          <hr class="my-15">
                          <div class="row">
                            <div class="col-md-6">

                              <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <p id="message"></p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="role">Pilih Role :</label>
                                <select class="custom-select form-control" id="role" name="role">
                                    <option value="">Pilih Role</option>
                                </select>
                                {{-- <input type="password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password"> --}}
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
    // $('#password, #confirm_password').on('keyup', function () {
    //     if ($('#password').val() == $('#confirm_password').val()) {
    //         $('#message').html('Password Cocok').css('color', 'green');
    //     } else
    //         $('#message').html('Password Tidak Sama').css('color', 'red');
    // });

    $('#createUser').on('submit', function(event){

    // check if the input is valid using a 'valid' property
    // if ($('#password').val() !== $('#confirm_password').val()) return false;

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
