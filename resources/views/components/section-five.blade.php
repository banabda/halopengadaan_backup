<style>
    .five-tittle{
        opacity: 0;
        transition: opacity 1s;
    }
    .five-btn-1{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .five-btn-2{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .five-btn-3{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.6s;

    }
    .five-btn-4{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.8s;

    }
    .five-btn-5{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1s;

    }
</style>
<div class="section-five">
    <div class="container section-five-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header mb-5 five-tittle">
                    Jenis Layanan
                </h1>
                <div class="row justify-content-center mb-md-4">
                    <div class="col-md-4 col-jenis text-center five-btn-1">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/konsultasi-online.png')}}" alt="" height="120vh">
                            </div>
                            <div class="col text-center align-self-center"><h4 class="font-weight-bold">Konsultasi Online</h4><p>Rp250.000,- /bulan</p></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-jenis text-center five-btn-2">
                        <div class="row linear-bg mx-auto py-4 px-3">
                            <div class="w-100"></div>
                            <div class="col align-items-center mt-2">
                                <img src="{{ asset('images/konsultasi-offline.png')}}" alt="" height="100vh">
                            </div>
                            <div class="col text-center align-self-center"><h4 class="font-weight-bold">Konsultasi Langsung via zoom</h4><p>Rp1.500.000,- /bulan</p></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-jenis text-center five-btn-3">
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
                    <div class="col-md-4 col-jenis text-center five-btn-4">
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
                    <div class="col-md-8 col-jenis text-left five-btn-5">
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