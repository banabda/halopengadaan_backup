<style>
    .four-tittle{
        opacity: 0;
        transition: opacity 1s;
    }
    .four-btn-1{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .four-btn-2{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .four-btn-3{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.6s;

    }
    .four-btn-4{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.8s;

    }
    .four-btn-5{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1s;

    }
    .four-btn-6{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.2s;
    }
    .four-btn-7{
        opacity: 0;
        transition: opacity 0.7s  ease-in;
        transition-delay: 1.4s;

    }
</style>
<div class="section-four">
    <div class="container section-four-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-content-header mb-5 four-tittle">
                    Kelebihan Layanan
                </h1>
                <div class="row justify-content-center mb-3 px-5">
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-1">
                        <img class="mx-auto kelebihanimg h-75" src="{{ asset('images/kelebihan/pro.svg')}}" style="display: block"  width="100%" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Ditangani Para Ahli Yang Berpengalaman</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-2">
                        <img src="{{ asset('images/kelebihan/tim.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Sumber Jawaban Dikelola Oleh Tim</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-3 p-1">
                        {{-- <div class="pt-3" style="background-color: grey; border-radius: 10%; height: 250px; width: 250px">
                        </div> --}}
                        <img src="{{ asset('images/kelebihan/chatonline.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Konsultasi Online</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-4">
                        <img src="{{ asset('images/kelebihan/waktu.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Hemat waktu</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-5">
                        <img src="{{ asset('images/kelebihan/biaya.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Hemat biaya</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-6">
                        <img src="{{ asset('images/kelebihan/cepat.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Respon yang cepat</p>
                    </div>
                    <div class="col-md-3 col-xs-6 divkelebihan four-btn-7">
                        <img src="{{ asset('images/kelebihan/privasi.svg')}}"  style="display: block"  width="100%" class="mx-auto kelebihanimg h-75" alt="ahli">
                        <p class="text-center section-content-paragraph h-25">Identitas terjaga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>