<style>
    .radialImg1{
        opacity: 0;
        transition: opacity 0.5s  ease-in;
    }
    .radialImg2{
        opacity: 0;
        transition: opacity 0.5s  ease-in;
    }
    .h-sect1{
        opacity: 0;
        position: relative;
        left: -50px;
        transition: left 0.3s ease-in, opacity 0.3s ease-in;
        transition-delay: 0.1s;
    }
    .p-sect1{
        opacity: 0;
        position: relative;
        left: -50px;
        transition: left 0.3s ease-in, opacity 0.3s ease-in;
        transition-delay: 0.2s;
    }
</style>

@extends('layouts.app')

@section('content')
{{-- <div class="radialImg1">
    <img src="{{ asset('images/back-sect-4.png') }}" alt="">

</div> --}}
{{-- <div class="radialImg2">
    <img src="{{ asset('images/back-sect-3.png') }}" alt="">

</div> --}}
<div class="sect1img">
    <img class="sect1imgtag" src="{{ asset('images/section1/background.png') }}" alt="">

</div>
<div class="sect2img">
    <img class="sect2imgtag" src="{{ asset('images/section2/image.png') }}" alt="">

</div>
<div class="sect3img">
    <img class="sect3imgtag" src="{{ asset('images/section3/image.png') }}" alt="">

</div>
<div class="section-one" id="section-one">
    @include('components.navbar')
    <div class="mt-5" style="height: inherit;">
        <div class="container section-one-content">
            <div class="row justify-content-center">
                <div class="col-md-6 left">
    
                    <h1 class="font-weight-bold section-content-header h-sect1 mb-3">Halo Pengadaan</h1>
                    <div class="p-sect1">
                        <p class="section-content-paragraph text-justify ">
                            Menghubungkan Para Pakar Pengadaan dengan pelaku pengadaan Baik dari Penyedia maupun Pengguna.
                        </p>
                        <p class="section-content-paragraph text-justify">
                            Sistem ini melibatkan Banyak Pakar dengan berbagai Keahlian khusus, serta memiliki Quality Assurance,
                            dimana semua jawaban terhadap pertanyaan akan dibedah dengan secara seksama berdasarkan peraturan perundang undangan.
                        </p>
                    </div>
    
                </div>
                <div class="col-md-6 right">
                    <div class="divimage" style="background-image: url({{ asset('images/header.jpg') }})">
                    <img src="{{ asset('images/section1/background-img.png') }}" alt="">
                        
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.section-two')
@include('components.section-three')
@include('components.section-four')
@include('components.section-five')
@include('components.section-six')
@endsection
<script>

</script>
<script>
    let opacity = [0,0,0,0,0];
    window.addEventListener('load', () => {
        document.querySelector(".h-sect1").style.opacity = 1;
        document.querySelector(".p-sect1").style.opacity = 1;
        document.querySelector(".h-sect1").style.left = 0;
        document.querySelector(".p-sect1").style.left = 0;
        document.querySelector(".sect1imgtag").style.top = '-175px';
        document.querySelector(".sect1imgtag").style.left = '-275px';
        document.querySelector(".sect1imgtag").style.opacity = 1;
    })


    window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll >= 550) {
        if (opacity[0] == 0) {
            opacity[0] = 1;
            document.querySelector(".two-tittle").style.opacity = 1;
            document.querySelector(".two-btn-1").style.opacity = 1;
            document.querySelector(".two-btn-2").style.opacity = 1;
            document.querySelector(".two-btn-3").style.opacity = 1;
            document.querySelector(".two-btn-4").style.opacity = 1;
            document.querySelector(".two-btn-5").style.opacity = 1;
            document.querySelector(".two-btn-6").style.opacity = 1;
            document.querySelector(".two-btn-7").style.opacity = 1;
            // document.querySelector(".sect2imgtag").style.opacity = 1;
            // document.querySelector(".sect2imgtag").style.left = '-400px';
        }
    }

    if (currentScroll >= 1200) {
        if (opacity[1] == 0) {
        opacity[1] = 1;
        document.querySelector(".three-img").style.opacity = 1;
        document.querySelector(".three-p-2").style.opacity = 1;
        document.querySelector(".three-p-1").style.opacity = 1;
        }
    }

    if (currentScroll >= 1900) {
        if (opacity[2] == 0) {
            opacity[2] = 1;
            document.querySelector(".four-tittle").style.opacity = 1;
            document.querySelector(".four-btn-1").style.opacity = 1;
            document.querySelector(".four-btn-2").style.opacity = 1;
            document.querySelector(".four-btn-3").style.opacity = 1;
            document.querySelector(".four-btn-4").style.opacity = 1;
            document.querySelector(".four-btn-5").style.opacity = 1;
            document.querySelector(".four-btn-6").style.opacity = 1;
            document.querySelector(".four-btn-7").style.opacity = 1;
            document.querySelector(".radialImg1").style.opacity = 1;
        }
    }

    if (currentScroll >= 2400) {
        if (opacity[3] == 0) {
            opacity[3] = 1;
            document.querySelector(".five-tittle").style.opacity = 1;
            document.querySelector(".five-btn-1").style.opacity = 1;
            document.querySelector(".five-btn-2").style.opacity = 1;
            document.querySelector(".five-btn-3").style.opacity = 1;
            document.querySelector(".five-btn-4").style.opacity = 1;
            document.querySelector(".five-btn-5").style.opacity = 1;
        }
    }

    if (currentScroll >= 3200) {
        if (opacity[4] == 0) {
            opacity[4] = 1;
            document.querySelector(".six-tittle").style.opacity = 1;
            document.querySelector(".six-btn-1").style.opacity = 1;
            document.querySelector(".six-btn-2").style.opacity = 1;
            document.querySelector(".six-btn-3").style.opacity = 1;
            document.querySelector(".six-btn-1").style.left = 0;
            document.querySelector(".six-btn-2").style.left = 0;
            document.querySelector(".six-btn-3").style.left = 0;
            document.querySelector(".radialImg2").style.opacity = 1;
        }
    }
    });
</script>
