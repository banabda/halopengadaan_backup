@extends('layouts.app')

@section('content')
<style>
    .two-tittle{
        opacity: 0;
        transition: opacity 1s;
    }
    .two-btn-1{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .two-btn-2{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .two-btn-3{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.6s;

    }
    .two-btn-4{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.8s;

    }
    .two-btn-5{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1s;

    }
    .two-btn-6{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.2s;
    }
    .two-btn-7{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.4s;

    }
</style>
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
                <div class="row mb-5 two-tittle">
                    <div class="col-md-12">
                        <h1 class="text-center section-content-header">Untuk Siapa Layanan Ini?</h1>
                    </div>
                </div>
                <div class="row mb-md-3 justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-1" disabled>
                            Pemerintah Pusat
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-2" disabled>
                            Pemerintah Daerah
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-3" disabled>
                            BUMN
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-4" disabled>
                            BUMD
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-5" disabled>
                            BLU
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-6" disabled>
                            BLUD
                        </button>
                    </div>
                    <div class="col-md-3 text-center div-lienar-bg">
                        <button class="linear-bg two-btn-7" disabled>
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
            <div class="col-md-5 divimage">
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
            <div class="col-md-7 divprapgraph">
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
                    {{-- <p class="section-content-paragraph text-justify">
                    Jika membutuhkan layanan khusus lainnya berupa Diskusi
                    Online Via ZOOM dan juga Jawaban tertulis, dapat
                    dilakukan dengan sebelumnya sudah terdaftar sebagai
                    Member.
                    </p> --}}
            </div>
        </div>
    </div>
</div>
<div class="section-four">
    <div class="container section-four-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header mb-5">
                    Kelebihan Layanan
                </h1>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img class="mx-auto kelebihanimg" src="{{ asset('images/ahli.png')}}" style="display: block"  width="60%" alt="ahli">
                        <p class="text-center section-content-paragraph">Ditangani oleh para ahli dan berpengalaman</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/sumber.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Sumber jawaban dikelola oleh tim</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/online.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Online (pertanyaan via Whatsapp)</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/waktu.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Hemat waktu</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/biaya.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Hemat biaya</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/respon.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Respon yang cepat</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan">
                        <img src="{{ asset('images/identitas.png')}}"  style="display: block"  width="60%" class="mx-auto kelebihanimg" alt="ahli">
                        <p class="text-center section-content-paragraph">Identitas terjaga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-five">
    <div class="container section-five-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header mb-5">
                    Jenis Layanan
                </h1>
                <div class="row justify-content-center mb-md-4">
                    <div class="col-md-4 col-jenis text-center">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/konsultasi-online.png')}}" alt="" height="120vh">
                            </div>
                            <div class="col text-center align-self-center"><h4 class="font-weight-bold">Konsultasi Online</h4><p>Rp250.000,- /bulan</p></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-jenis text-center">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/konsultasi-offline.png')}}" alt="" height="100vh">
                            </div>
                            <div class="col text-center align-self-center"><h4 class="font-weight-bold">Konsultasi Langsung via zoom</h4><p>Rp1.500.000,- /bulan</p></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-jenis text-center">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/pertanyaan.png')}}" alt="" height="100vh">
                            </div>
                            <div class="col text-center align-self-center"><h4 class="font-weight-bold">Pertanyaan Tertulis</h4><p>Rp..(ditetapkan setelah melihat besaran pertanyaan)</p></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-4 col-jenis text-center">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/jam.png')}}" alt="" height="100vh">
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center align-self-center">
                                <h4 class="font-weight-bold">Jam Layanan</h4>
                                <p>09.00 - 20.00 WIB<br>Senin - Jumat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-jenis text-left">
                        <div class="row linear-bg big mx-auto d-md-flex py-4 px-3">
                            <div class="col align-self-center mt-2 text-center">
                                <img class="imagemember" src="{{ asset('images/membership.png')}}" alt="" height="180vh">
                            </div>
                            <div class="col text-left align-self-center">
                                <h4 class="font-weight-bold">Fasilitas membership</h4>
                                <p>• Layanan Konsultasi Online 
                                    <br>• Voucer Pelatihan senilai Rp. 250.000,-
                                    <br>• Akses Khusus Berbagai Video Pembelajaran terkait Pengadaan
                                </p>
                            </div>
                            {{-- <div style="width: 10%"></div> --}}
                        </div>
                    </div>
                    {{-- <div class="col-md-8 col-jenis text-left">
                        <div class="linear-bg big mx-auto py-4 px-5 d-md-flex align-items-center" style="display: block">
                            <img src="{{ asset('images/membership.png')}}" alt="" width="25%">
                            <div class="ml-4">
                                <h4 class="font-weight-bold">Fasilitas membership</h4>
                                <p>• Layanan Konsultasi Online 
                                    <br>• Voucer Pelatihan senilai Rp. 250.000,-
                                    <br>• Akses Khusus Berbagai Video Pembelajaran terkait Pengadaan</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const checkpoint = 500;
    let opacity = 0;

    window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll >= checkpoint && opacity < 1) {
        opacity = 1; 
    } 

    document.querySelector(".two-tittle").style.opacity = opacity;
    document.querySelector(".two-btn-1").style.opacity = opacity;
    document.querySelector(".two-btn-2").style.opacity = opacity;
    document.querySelector(".two-btn-3").style.opacity = opacity;
    document.querySelector(".two-btn-4").style.opacity = opacity;
    document.querySelector(".two-btn-5").style.opacity = opacity;
    document.querySelector(".two-btn-6").style.opacity = opacity;
    document.querySelector(".two-btn-7").style.opacity = opacity;
    });
</script>
@endsection
