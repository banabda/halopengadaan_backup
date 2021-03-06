@extends('dashboard.dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Artikel</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Auth</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Artikel</li>
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
                  <button type="button" class="btn btn-outline btn-primary mb-5" data-toggle="modal"
                    data-target="#exampleModal">New Artikel</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableArtikel" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Link Artikel</th>
                              <th>Foto</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Link Artikel</th>
                              <th>Foto</th>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="createArtikel" action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="id" id="id_artikel">
                <div class="form-group">
                    <label for="judul_artikel" class="col-form-label">Judul:</label>
                    <input type="text" class="form-control" name="judul" id="judul_artikel">
                </div>
                <div class="form-group">
                    <label for="deskripsi_artikel" class="col-form-label">Deskripsi:</label>
                    <textarea class="form-control" name="desc" id="deskripsi_artikel"></textarea>
                </div>
                <div class="form-group">
                    <label for="link_artikel" class="col-form-label">Link Terkait:</label>
                    <input type="url" class="form-control" name="link" id="link_artikel">
                </div>
                <div class="form-group">
                    <label for="foto_artikel" class="col-form-label">Foto Thumbnail:</label>
                    <input type="file" class="form-control" name="foto" id="foto_artikel">
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan!</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
    var table;
      $(function() {
          table = $('#tableArtikel').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('artikel.index') }}",
              columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className : "text-center"},
                {data: 'judul', name: 'judul'},
                {data: 'link_url', name: 'link_url'},
                {data: 'foto_artikel', name: 'foto_artikel'},
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

    $('#createArtikel').on('submit', function(event){

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
                if(data.status == "ok"){
                    $('#exampleModal').modal('toggle')
                    table.draw(false);
                }
            },

            error: (data) => {

            }
        });
    });

    $(document).on('click', '.edit-artikel', function(e){
        var id_artikel = $(this).attr("id");
        console.log("Masuk Edit");
        e.preventDefault();
        $.ajax({
            type:'GET',
            url: "{{url('admin/artikel')}}/" + id_artikel + '/edit',
            success:function(data)
            {
                $('#exampleModal').modal('show');
                $('#id_artikel').val(data.id);
                $('#judul_artikel').val(data.judul);
                $('#deskripsi_artikel').val(data.desc);
                $('#link_artikel').val(data.link);
                console.log(data);


            },
            error: function(data){
            }
        });
    });
</script>
@endsection
