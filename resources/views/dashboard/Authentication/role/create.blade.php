@extends('dashboard.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Create New Role</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Create Role</li>
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
                    <h4 class="box-title">New Role</h4>
                  </div>
                  <!-- /.box-header -->
                  <form class="form" id="createRole" action="{{ route('role.store') }}">
                      <div class="box-body">
                          <h4 class="box-title text-info"><i class="ti-control-shuffle mr-15"></i> Data Role</h4>
                          <hr class="my-15">
                          <div class="row">
                            <div class="col-md-6">

                              <div class="form-group">
                                <label>Nama Role</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Role">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Guard Name</label>
                                <input type="text" class="form-control" name="guard_name" placeholder="Nama Guard Name" value="web">
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{ route('role.index') }}"><button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
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

    $('#createRole').on('submit', function(event){

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
            window.location.href = '{{ route("role.index") }}';
        },

        error: (data) => {

        }
    });
    });
</script>
@endsection
