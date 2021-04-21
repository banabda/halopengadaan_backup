@extends('dashboard.dashboard')
@section('content')
<!-- Tiny MCE -->
<script src="{{ asset('tinymce/js/tinymce.min.js') }}"></script>

<script>
    tinymce.init({
        selector: 'textarea.editor',  // change this value according to your HTML
        plugins: 'lists,table,textcolor',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    });
</script>
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
                            <li class="breadcrumb-item" aria-current="page">FAQ</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah FAQ</li>
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
                          <h4 class="box-title">Tambah FAQ baru</h4>
                        </div>
                        <!-- /.box-header -->
                        <form class="form" id="createFaq" action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="box-body">
                                <hr class="my-15">
                                  <div class="form-group">
                                      <label>Pertanyaan</label>
                                      <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Jawaban</label>
                                      <textarea name="jawaban" class="form-control editor" rows="20" placeholder="jawaban"></textarea>
                                  </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-right">
                                <a href="{{ route('faq.index') }}"><button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                  <i class="ti-trash"></i> Cancel
                                </button></a>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                  <i class="ti-save-alt"></i> Publish
                                </button>
                            </div>
                        </form>
                      </div>
                </div>
            </section>

    </div>
 </div>

@endsection
