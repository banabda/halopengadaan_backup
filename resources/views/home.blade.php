@extends('layouts.app')

@section('content')

<div class="section-one" style="background-image: url('{{ asset('images/background-sec1.png') }}');">
    @include('components.navbar')
    <div class="container section-one-content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div> --}}

                <h1 class="font-weight-bold section-one-content-header">Halo Pengadaan</h1>
                <p class="section-one-content-paragraph">Menghubungkan Para Pakar Pengadaan dengan pelaku pengadaan Baik dari Penyedia maupun Pengguna. Melibatkan  Banyak Pakar dengan berbagai
                    Keahlian khusus, serta memiliki Quality Assurance,
                    dimana semua jawaban terhadap pertanyaan akan
                    dibedah dengan secara seksama berdasarkan peraturan 
                    perundang undangan.</p>

            </div>
            <div class="col-md-6 p-2">
                <div class="section-one-content-image">
                    <div class="overlay">
                        <div class="items"></div>
                        <div class="items head">
                            <p>Lembaga Konsultasi dan Pengembangan Nasional</p>
                            <hr>
                        </div>
                        <div class="items price">
                            <p class="old">$699</p>
                            <p class="new">$345</p>
                        </div>
                        <div class="items cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>ADD TO CART</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-two">
    <div class="container section-two-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h1 class="text-center">Untuk Siapa Layanan Ini?</h1>
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            Pemerintah Pusat
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            Pemerintah Daerah
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            BUMN
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            BUMD
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            BLU
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            BLUD
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg" disabled>
                            Penyedia
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="section-three" style="background-image: url('{{ asset('images/background-sec3.png') }}');">

</div>
@endsection
