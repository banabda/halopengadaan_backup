@extends('layouts.app')
@section('content')
<div class="section-one" id="section-one">
    @include('components.navbar')
    <div class="container">
        <div class="regulasi">
            <div class="row">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($artikel as $item)
                                <div class="col-md-4 mb-4 p-0">
                                    @include('components.berita-card', ['title'=> $item->judul, 'detail'=> Str::limit(strip_tags($item->desc), 150, ''), 'imgsrc'=> $item->foto, 'slug' => $item->slug])
                                </div>
                            @endforeach
                            
                        </div>
                    </div>

                    <div class="col-12 col-md-4 section-two-artikel">
                        <div class="how2 how2-c14 flex-s-c">
                            <h3 class="f1-m-2 cl2 tab01-title">
                                Artikel
                            </h3>
                        </div>

                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                            style="display:block; text-align:center;"
                            data-ad-layout="in-article"
                            data-ad-format="fluid"
                            data-ad-client="ca-pub-6746594015510305"
                            data-ad-slot="7417722766"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @foreach ($randomArtikel as $item)
                        <div class="card artikel-card w-100 shadow-sm" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-12 col-md-6 image-div-artikel-terkait">
                                <img class="image-artikel-terkait" src="{{ Storage::url($item->foto) }}" alt="" srcset="" >
                            </div>
                            <div class="col-12 col-md-6 artikel-terkait" >
                                <a href="{{ route('landing.artikel.show', $item->slug) }}" style="color: inherit; text-decoration:none"><h3 class="font-artikel-terkait"> {{ $item->judul }}</h3></a>
                                <p class="time-artikel-terkait">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
