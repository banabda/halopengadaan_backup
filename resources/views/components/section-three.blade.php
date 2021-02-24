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
<div class="section-three" style="background-image: url('{{ asset('images/background-sec3.png') }}');">
    <div class="container section-three-content">
        <div class="row justify-content-center">
            <div class="col-md-5 divimage">
                <div class="section-three-content-image mt-5 three-img">
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
                <p class="section-content-paragraph text-justify three-p-1">
                    Halo Pengadaan ini di kembangkan Oleh LPKN Training
                    Center yang merupakan LPP dari LKPP, sebagai wujud
                    pengembangan dan Inovasi pada Bidang Pengadaan
                    Barang/Jasa sekaligus membangun ekosistempenga
                    dan dengan melibatkan berbagai stakeholder yang ada. </p>
                    <p class="section-content-paragraph text-justify three-p-2">
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
