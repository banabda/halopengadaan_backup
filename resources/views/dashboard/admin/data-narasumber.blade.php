@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Narasumber</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data Narasumber</li>
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
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="status">Status User</label>
                            <select id="status" name="status" class="form-control">
                                <option selected value="-1">ALL</option>
                                <option value="Belum Teraktifasi">Belum Teraktifasi</option>
                                <option value="Teraktifasi">Teraktifasi</option>
                            </select>
                        </div>
                    </div>
                    <table id="tableNarasumber" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Action</th>
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
          table = $('#tableNarasumber').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: "{{ route('admin.dashboard.narasumber') }}",
                  data : function(narasumber){
                     narasumber.status = $('#status').val();
                  }
              },
              columns: [
                {data: 'id', name: 'id', className : "text-center"},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className : "text-center"},
              ]
          });

          table.on( 'order.dt search.dt', function () {
            table.column(0, {order:'applied', search:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
          }).draw();

          $('#status').on('change', function(){
			table.draw(false);
		});
      });
</script>
<script>
    $(document).on('click', '.user-confirm', function(){
        var id_user = $(this).attr("id");
        console.log(id_user);
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: "{{url('admin/narasumber/verify')}}/" + id_user,
            success:function(data)
            {
                if(data.status == "ok"){
                    table.draw(false);
                }
            },
            error: function(data){

            }
        });
    });
</script>
@endsection
