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
                        @include('components.membership-card', ['title'=>'Silver', 'harga'=>'250.000', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga']])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-1">
                        @include('components.membership-card', ['title'=>'Gold', 'harga'=>'600.000', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga']])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-1">
                        @include('components.membership-card', ['title'=>'Platinum', 'harga'=>'1.500.000', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga']])
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
