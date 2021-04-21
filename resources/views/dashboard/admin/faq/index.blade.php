@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Tambah FAQ</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Tambah FAQ</li>
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
                  <a href="{{ route('faq.create') }}"><button type="button" class="btn btn-outline btn-primary mb-5" >Tambah FAQ</button></a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableFaqadmin" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>Jawaban</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>Jawaban</th>
                              <th style="width: 200px;">Action</th>
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
          table = $('#tableFaqadmin').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('faq.index') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className : "text-center"},
                {data: 'pertanyaan', name: 'pertanyaan'},
                {data: 'jawaban', name: 'jawaban'},
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
    $(document).on('click', '   .delete-confirm', function(){
        var id_faq = $(this).attr("id");
        // console.log(id_artikel);
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
            confirmButtonText: "Hapus",
            confirmButtonColor: "#ff0055",
            cancelButtonColor: "#999999",
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'DELETE',
                    url: "{{url('admin/faq')}}/" + id_faq,
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







