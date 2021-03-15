@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Paket Zoom</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data Paket Zoom</li>
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
                    <table id="dataZoom" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th>Nomor WhatsApp</th>
                              <th>Judul Pesan</th>
                              <th>Pesan</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor WhatsApp</th>
                            <th>Judul Pesan</th>
                            <th>Pesan</th>
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
          table = $('#dataZoom').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.dashboard.zoom') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className : "text-center"},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'email', name: 'email'},
                {data: 'nomor_whatsapp', name: 'nomor_whatsapp'},
                {data: 'judul', name: 'judul'},
                {data: 'message', name: 'message'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className : "text-center"},
              ]
          });
          table.on( 'order.dt search.dt', function () {
            table.column(0, {order:'applied', search:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
      });
</script>
<script>
    $(document).on('click', '.zoom-confirm', function(){
        var id_message = $(this).attr("id");
        
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            text : "Mohon menunggu..."
        });

        swal.showLoading();
        $.ajax({
            type:'POST',
            url: "{{url('admin/message/zoom//')}}/" + id_message,
            success:function(data)
            {
                if(data.status == "ok"){
                    swal.close();
                    table.draw(false);
                }
            },
            error: function(data){
            }
        });
    });
</script>
@endsection
