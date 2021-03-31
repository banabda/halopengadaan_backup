@extends('layouts.app')
@section('content')
<div class="section-one" id="section-one">
    @include('components.navbar')
    <div class="container">
        <nav aria-label="breadcrumb" class="pl-2" style="margin-top: 65px; ">
            <ol class="breadcrumb" style="background-color: inherit; padding-left: 0px">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Artikel</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-12 col-md-12 pb-3">
                        <h2 class="pl-2 title-artikel text-justify">{{ $artikel->judul }}</h2>
                        <p class="pl-2 text-muted d-inline additional-information"><i class="far fa-eye"></i> {{ $view }} views </p>
                        <p class="pl-2 text-muted d-inline additional-information"><i class="far fa-clock"></i>
                            {{ Carbon\Carbon::parse($artikel->created_at)->diffForHumans() }}
                         </p>
                    </div>
                </div>
                <div class="card shadow" style="border-radius: 15px">
                    <img src="{{ Storage::url($artikel->foto) }}" style="border-radius: 10px 10px 0 0" class="card-img-top" alt="...">
                    <div class="card-body">
                      <div class="card-text mt-3 text-justify">
                        {!! $artikel->desc !!}
                      </div>
                    </div>
                </div>
                <br>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Bottom Page Halopengadaan -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6746594015510305"
                    data-ad-slot="1073333318"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div class="col-12 col-md-4 section-two-artikel">
                <div class="how2 how2-c14 flex-s-c">
                    <h3 class="f1-m-2 cl2 tab01-title">
                        Artikel
                    </h3>
                </div>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Right Sidebar Halopengadaan -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6746594015510305"
                    data-ad-slot="4790228808"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                {{-- <div class="card">
                    <div class="card-body">
                        <h3 >Artikel Terkait</h3>
                    </div>
                </div> --}}
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
@endsection
