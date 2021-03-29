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
                @foreach ($regulasi as $item)
                <div class="col-md-6">
                    <div class="card card-regulasi shadow-lg mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://jdih.lkpp.go.id/backend/web/uploads/images/surat-edaran.png" class="card-img-top img-regulasi" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="date-regulasi">
                                        <i class="fa fa-calendar-alt" aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                                    </div>
                                    <h5 class="title-regulasi mt-3">{{ $item->nama_regulasi }}</h5>
                                    <a target="_blank" href="{{ route('landing.regulasi.dokumen', $item->id) }}" class="btn btn-secondary btn-sm mt-4">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="card card-regulasi shadow-lg mt-3">
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
                                    <a href="#" class="btn btn-secondary btn-sm mt-4">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
