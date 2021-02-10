<style>
    .six-tittle{
        opacity: 1;
        transition: opacity 1s;
    }
    .six-btn-1{
        opacity: 1;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.2s;
    }
    .six-btn-2{
        opacity: 1;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.4s;

    }
    .six-btn-3{
        opacity: 1;
        transition: opacity 0.7s  ease-in;
        transition-delay: 0.6s;

    }
</style>
<div class="section-six">
    <div class="container section-six-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-5 six-tittle">
                    <div class="col-md-12">
                        <h1 class="text-center section-content-header">Membership</h1>
                    </div>
                </div>
                <div class="row justify-content-center mb-md-4">
                    <div class="col-md-4 col-jenis six-btn-1">
                        @include('components.membership-card', ['title'=>'Silver', 'harga'=>'250.000,- / Bulan', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga'], 'id' => 1])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-1">
                        @include('components.membership-card', ['title'=>'Gold', 'harga'=>'600.000,- / 3 Bulan', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga', 'Lebih murah'], 'id' => 2])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-1">
                        @include('components.membership-card', ['title'=>'Platinum', 'harga'=>'1.500.000,- / 3 Bulan', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga', 'Konsultasi via Zoom'], 'id' => 3])
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
