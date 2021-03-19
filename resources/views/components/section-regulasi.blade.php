@extends('layouts.app')
@section('content')
<div class="section-one" id="section-one">
    @include('components.navbar')
    <div class="container">
        <div class="regulasi">
            <button class="btn btn-danger mb-2 btn-title">
               <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Produk Hukum Terbaru
            </button>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://jdih.lkpp.go.id/backend/web/uploads/images/surat-edaran.png" class="card-img-top img-regulasi" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="date-regulasi">
                                        <i class="fa fa-calendar-alt" aria-hidden="true"></i> 15 Maret 2021
                                    </div>
                                    <h5 class="title-regulasi mt-3">Surat Edaran Kepala LKPP Nomor 1 Tahun 2021</h5>
                                    <a href="#" class="btn btn-success btn-sm mt-4">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
