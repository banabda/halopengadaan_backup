@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Pembayaran</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
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
                        {{-- Status Pembayaran --}}
                        <div class="form-group col-md-4">
                            <label for="status">Status Pembayaran</label>
                            <select id="status" name="status" class="form-control">
                                <option value="-1">ALL</option>
                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                <option value="Telah Terbayar">Menunggu Konfirmasi</option>
                                <option value="Terkonfirmasi">Terkonfirmasi</option>
                            </select>
                        </div>
                        {{-- Metode Pembayaran --}}
                        <div class="form-group col-md-4">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <select id="metode_pembayaran" name="metode_pembayaran" class="form-control">
                                <option selected value="-1">ALL</option>
                                @foreach ($metode_pembayaran as $item)
                                    <option value="{{ $item->nama_provider }}">{{ $item->nama_provider }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
              ajax: {
                  url: "{{ route('admin.dashboard.invoice') }}",
                  data : function(invoice){
                     invoice.status = $('#status').val();
                     invoice.metode_pembayaran = $('#metode_pembayaran').val();
                  }
              },
              columns: [
                {data: 'id', name: 'id', className : "text-center"},
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
          }).draw();

          $('#status').on('change', function(){
			table.draw(false);
          });

          $('#metode_pembayaran').on('change', function(){
			table.draw(false);
          });
      });
</script>
<script>
    $(document).on('click', '.invoice-confirm', function(){
        var id_invoice = $(this).attr("id");
        // console.log(id_invoice);
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
            url: "{{url('admin/proses/invoice/')}}/" + id_invoice,
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
