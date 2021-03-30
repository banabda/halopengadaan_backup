
<div class="card m-2 h-100 shadow-lg" style="border-radius:20px;">
    <div class="card-body" style="padding: 0;">
        <div class="mx-auto imgdiv">
            <img src="{{ Storage::url($imgsrc) }}" alt="" srcset="" style="
            height: 200px;
            width: 100%;
            object-fit: cover;
            border-radius: 16px 16px 0 0;
            ">
        </div>
        <div class="d-flex my-2">
        {{-- @foreach ($tags as $tag)
            <div class="tag mr-2">{{ $tag }}</div>
        @endforeach --}}
        </div>
        <div class="content-artikel" style="padding: 0 15px;">
            <a href="{{ route('landing.artikel.show', $slug) }}" style="color: inherit; text-decoration:none"><h3 class="title my-3" style="font-size: 23px">{{ $title }}</h3></a>
            <p style="padding-top: 10px">{!! $detail !!} <a href="{{ route('landing.artikel.show', $slug) }}">Selengkapnya ...</a></p>

        </div>
    </div>
</div>
