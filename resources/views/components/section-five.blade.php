<div class="section-five">
    <div class="container section-five-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header mb-5 five-tittle">
                    Jenis Layanan
                </h1>
                <div class="row justify-content-center mb-md-4">
                    <div class="col-md-4 text-center five-btn-1">
                        @include('components.section-five-card', ['big'=> false,'title'=>'Konsultasi Online', 'detail'=>'Rp250.000,- /bulan', 'imgsrc' => asset('images/section5/image2.png'), 'point' => []])
                    </div>
                    <div class="col-md-4 text-center five-btn-2">
                        @include('components.section-five-card', ['big'=> false,'title'=>'Konsultasi Langsung via zoom', 'detail'=>'Rp1.500.000,- / 1 jam', 'imgsrc' => asset('images/section5/image3.png'), 'point' => []])
                    </div>
                    <div class="col-md-4 text-center five-btn-3">
                        @include('components.section-five-card', ['big'=> false,'title'=>'Pertanyaan Tertulis', 'detail'=>'Hubungi admin untuk informasi lebih lanjut', 'imgsrc' => asset('images/section5/image4.png'), 'point' => []])
                    </div>
                </div>
                <div class="row justify-content-center mb-md-3">
                    <div class="col-md-4 text-center five-btn-4">
                        @include('components.section-five-card', ['big'=> false,'title'=>'Jam Layanan', 'detail'=>'09.00 - 20.00 WIB<br>Senin - Jumat', 'imgsrc' => asset('images/section5/image5.png'), 'point' => []])
                    </div>
                    <div class="col-md-8 text-center five-btn-5">
                        @include('components.section-five-card', ['big'=> true,'title'=>'Fasilitas membership', 'detail'=>'asdsasadd', 'imgsrc' => asset('images/section5/image6.png'), 'point' => ['Layanan Konsultasi Online','Voucer Pelatihan senilai Rp. 250.000,-','Akses Khusus Berbagai Video Pembelajaran terkait Pengadaan']])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
