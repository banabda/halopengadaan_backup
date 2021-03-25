@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Profile Narasumber</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data Profile Narasumber</li>
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
                                <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                                <option value="Teraktifasi">Teraktifasi</option>
                            </select>
                        </div>
                    </div>
                    <table id="tableNarasumberProfile" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Profile</th>
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
                              <th>Profile</th>
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

<!-- Modal -->
<div class="modal fade" id="modalProfileNarasumber" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Narasumber</h4>
        </div>
        <div class="modal-body">
            <div class="name">
                <p>Nama Lengkap: </p>
                <span></span>
            </div>
            <div class="email">
                <p>Email: </p>
                <span></span>
            </div>
            <div class="no_hp">
                <p>No HP: </p>
                <span></span>
            </div>
            <div class="keahlian_utama">
                <p>Keahlian Utama: </p>
                <span></span>
            </div>
            <div class="keahlian_pendukung">
                <p>Keahlian Pendukung: </p>
                <span></span>
            </div>
            <div class="cv">
              <p>CV: </p>
              <span></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div>

<script>
    var table;
      $(function() {
          table = $('#tableNarasumberProfile').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url: "{{ route('admin.dashboard.narasumber.profile') }}",
                //   data : function(narasumber){
                //      narasumber.status = $('#status').val();
                //   }
              },
              columns: [
                {data: 'nomor', name: 'nomor', className : "text-center"},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'profile', name: 'profile'},
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
        $(document).on('click', '.profile-narasumber', function(){
            $("#modalProfileNarasumber").modal("show");
        });
</script>
<script>
    $(document).on('click', '.aktifasi-narasumber', function(){
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
