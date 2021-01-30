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

                <h1 class="font-weight-bold section-content-header">Halo Pengadaan</h1>
                <p class="section-content-paragraph text-justify">Menghubungkan Para Pakar Pengadaan dengan pelaku pengadaan Baik dari Penyedia maupun Pengguna. </p>

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
                    <div class="col-md-12">
                        <h1 class="text-center section-content-header">Untuk Siapa Layanan Ini?</h1>
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
    <div class="container section-three-content">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="section-three-content-image mt-5">
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
            <div class="col-md-7">
                <p class="section-content-paragraph text-justify">
                    Halo Pengadaan ini di kembangkan Oleh LPKN Training
                    Center yang merupakan LPP dari LKPP, sebagai wujud
                    pengembangan dan Inovasi pada Bidang Pengadaan
                    Barang/Jasa sekaligus membangun ekosistempenga
                    dan dengan melibatkan berbagai stakeholder yang ada. </p>
                    <p class="section-content-paragraph text-justify">
                    Untuk mendapatkan layanan ini, membutuhkan
                    keanggotaan (membership) bulanan, konsultasi bagi
                    member dilakukan secara Online (via WA).
                    </p>
                    <p class="section-content-paragraph text-justify">
                    Jika membutuhkan layanan khusus lainnya berupa Diskusi
                    Online Via ZOOM dan juga Jawaban tertulis, dapat
                    dilakukan dengan sebelumnya sudah terdaftar sebagai
                    Member.
                    </p>
            </div>
        </div>
    </div>
</div>
<div class="section-four">
    <div class="container section-four-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header">
                    Jenis Layanan
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection
