
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
                        @include('components.membership-card', ['title'=>'30 Menit / Sesi', 'harga'=>'50.000,- / Sesi', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga'], 'id' => 1])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-2 my-3 my-md-0">
                        @include('components.membership-card', ['title'=>'Bulanan', 'harga'=>'250.000,- / 3 Bulan', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga', 'Lebih murah'], 'id' => 2])
                    </div>
                    <div class="col-md-4 col-jenis six-btn-3">
                        @include('components.membership-card', ['title'=>'Konsultasi Via zoom', 'harga'=>'1.500.000,- / 1 Jam', 'point' => ['Ditangani para ahli','Sumber jawaban terkelola','Fast response','Identitas terjaga', 'Konsultasi via Zoom'], 'id' => 3])
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
