<div class="section-seven" id="section-seven">
    <div class="container section-seven-content">
        <h1 class="section-content-header seven-title">
            Artikel
        </h1>
        <div class="sort-berita d-flex">
            <div class="mr-3 underline">Terbaru</div>
        </div>
        <div class="row">
            @foreach ($artikel as $item)
                <div class="col-md-4 mb-4 p-0">
                    @include('components.berita-card', ['title'=> $item->judul, 'detail'=> Str::limit(strip_tags($item->desc), 150, ''), 'imgsrc'=> $item->foto, 'slug' => $item->slug])
                </div>
            @endforeach
        </div>
    </div>
</div>
