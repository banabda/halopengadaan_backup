@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Users</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Users</li>
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
                <a href="{{ route('user.create') }}"><button type="button" class="btn btn-outline btn-primary mb-5">New User</button></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="dataInvoice" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th>Nama Paket</th>
                              <th>Metode Pembayaran</th>
                              <th>Nama Provider</th>
                              <th>Total Tagihan</th>
                              <th>Nama Pemilik Rekening</th>
                              <th>Tanggal</th>
                              <th>Bukti Pembayaran</th>
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
                              <th>Nama Paket</th>
                              <th>Metode Pembayaran</th>
                              <th>Nama Provider</th>
                              <th>Total Tagihan</th>
                              <th>Nama Pemilik Rekening</th>
                              <th>Tanggal</th>
                              <th>Bukti Pembayaran</th>
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
          table = $('#dataInvoice').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.dashboard.invoice') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className : "text-center"},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'email', name: 'email'},
                {data: 'paket_detail', name: 'paket_detail'},
                {data: 'metode_pembayaran', name: 'metode_pembayaran'},
                {data: 'nama_bank', name: 'nama_bank'},
                {data: 'total_tagihan', name: 'total_tagihan'},
                {data: 'nama_rekening', name: 'nama_rekening'},
                {data: 'tanggal', name:'tanggal'},
                {data: 'foto', name: 'foto'},   
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
    $(document).on('click', '.invoice-confirm', function(){
        var id_invoice = $(this).attr("id");
        console.log(id_invoice);
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: "{{url('admin/proses/invoice/')}}/" + id_invoice,
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
