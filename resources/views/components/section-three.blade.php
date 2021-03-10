<style>
    .three-img{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .three-p-1{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .three-p-2{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
</style>
<div class="section-three" id="section-three">
    <div class="container section-three-content">
        <div class="row justify-content-center">
            <div class="col-md-5 left three-img">
                <div class="divimage" style="background-image: url({{ asset('images/header.jpg') }})">
                    <img src="{{ asset('images/section1/background-img.png') }}" alt="">  
                </div>
            </div>
            <div class="col-md-7 divprapgraph">
                <p class="section-content-paragraph text-justify three-p-1">
                    Halo Pengadaan ini di kembangkan Oleh LPKN Training Center yang merupakan LPP dari LKPP, sebagai wujud pengembangan dan Inovasi pada Bidang Pengadaan Barang/Jasa sekaligus membangun ekosistem pengadaan dengan melibatkan berbagai stakeholder yang ada.
                </p>
                <p class="section-content-paragraph text-justify three-p-2">
                    Untuk mendapatkan layanan ini, membutuhkan
                    keanggotaan (membership) bulanan, konsultasi bagi
                    member dilakukan secara Online.
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
