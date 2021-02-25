@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Invoice</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Invoice</li>
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
                {{-- <h3 class="box-title">Data Table With Full Features</h3> --}}
                <a href=""><button type="button" class="btn btn-outline btn-primary mb-5">New User</button></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableInvoiceprofil" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Paket</th>
                              <th>Total Pembayaran</th>
                              <th>Tanggal</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Paket</th>
                              <th>Total Pembayaran</th>
                              <th>Tanggal</th>
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
          table = $('#tableInvoiceprofil').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('user.dashboard.invoice') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className : "text-center"},
                {data: 'paket_detail', name: 'paket_detail'},
                {data: 'total_tagihan', name: 'total_tagihan'},
                {data: 'tanggal', name: 'tanggal'},
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
    $(document).on('click', '.invoice-download', function(){
        var id_role = $(this).attr("id");
        // console.log(id_role);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        event.preventDefault();
        Swal.fire({
            title: "Apakah Anda Yakin Ingin Menghapus Ini?",
            // type: "info",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Delete",
            confirmButtonColor: "#ff0055",
            cancelButtonColor: "#999999",
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'DELETE',
                    url: "{{url('admin/user')}}/" + id_role,
                    success:function(data)
                    {
                        if(data.status == "ok"){
                            table.draw(false);
                        }
                    },
                    error: function(data){
                    }
                });
            }
        })
    });
</script>
@endsection
