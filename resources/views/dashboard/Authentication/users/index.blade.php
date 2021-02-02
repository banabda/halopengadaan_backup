@extends('dashboard.dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Tables</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tables</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
                <h3 class="box-title">Data Table With Full Features</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableUser" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                          </tr>
                      </tfoot>
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
<!-- /.content-wrapper -->
<script>
    var table;
      $(function() {
          table = $('#tableUser').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('user.index') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className : "text-center"},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                // {data: 'action', name: 'action', orderable: false, searchable: false, className : "text-center"},
              ]
          });
          table.on( 'order.dt search.dt', function () {
            table.column(0, {order:'applied', search:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
      });
</script>
@endsection
