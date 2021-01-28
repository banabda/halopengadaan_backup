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

                <h1 class="font-weight-bold">Halo Pengadaan</h1>
                <p>Menghubungkan Para Pakar Pengadaan dengan pelaku pengadaan Baik dari Penyedia maupun Pengguna. Melibatkan  Banyak Pakar dengan berbagai
                    Keahlian khusus, serta memiliki Quality Assurance,
                    dimana semua jawaban terhadap pertanyaan akan
                    dibedah dengan secara seksama berdasarkan peraturan 
                    perundang undangan.</p>

            </div>
            <div class="col-md-6">
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
                    <div class="col">
                        <h1 class="text-center">Untuk Siapa Layanan Ini?</h1>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-3 text-center">Bumn</div>
                    <div class="col-md-3 text-center">Bumn</div>
                    <div class="col-md-3 text-center">Bumn</div>
                    <div class="col-md-3 text-center">Bumn</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">Bumn</div>
                    <div class="col-md-3 text-center">Bumn</div>
                    <div class="col-md-3 text-center">Bumn</div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="section-three">
    
</div>
@endsection
