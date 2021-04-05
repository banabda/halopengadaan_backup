@extends('layouts.app')

@section('content')

<div class="sect1img">
    <img class="sect1imgtag" src="{{ asset('images/section1/background.png') }}" alt="">

</div>
<div class="sect2img">
    <img class="sect2imgtag" src="{{ asset('images/section2/image.png') }}" alt="">

</div>
<div class="sect3img">
    <img class="sect3imgtag" src="{{ asset('images/section3/image.png') }}" alt="">

</div>
<div class="sect4img">
    <img class="sect4imgtag1" src="{{ asset('images/section4/image1.png') }}" alt="">
</div>
<div class="sect4img2">
    <img class="sect4imgtag2" src="{{ asset('images/section4/image2.png') }}" alt="">
</div>
<div class="sect5img">
    <img class="sect5imgtag" src="{{ asset('images/section5/image.png') }}" alt="">

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
@include('components.section-eight')
@include('components.section-seven')

@endsection
