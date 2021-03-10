<div class="section-seven" id="section-seven">
    <div class="container section-seven-content">
        <h1 class="section-content-header seven-title">
            Artikel
        </h1>
        <div class="sort-berita d-flex">
            <div class="mr-3 underline">Terbaru</div>
            <div class="">Terpopuler</div>
        </div>
        <div class="row">
            @for ($i = 1; $i < 9; $i++)
                <div class="col-md-4 mb-4 p-0">
                    @include('components.berita-card', ['title'=>'Judul Berita '.$i, 'detail'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam odit dolor itaque, at eveniet dicta sint aut accusantium, animi consequuntur, minus dolorem omnis nostrum quia voluptate nihil. Quisquam, sed aliquid?', 'imgsrc'=>'', 'tags' => ['tag 1','tag 2','tag 3'], 'id' => $i])
                </div>
            @endfor
        </div>
    </div>
</div>