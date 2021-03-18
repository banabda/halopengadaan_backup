<div class="linear-bg mx-auto py-4 px-3 text-center">
    <div class="h-25">
        <h2>{{ $title }}</h2>
    </div>
    <div class="h-25">
        <h1>Rp {{ $harga }},-</h1>
    </div>
    <div class="h-50">
        <ul class="text-left">
            @foreach ($point as $item)
            <li><h6 class="py-1">{{ $item }}</h6></li>
            @endforeach

        </ul>
        <form class="form-button" action="{{ route('landing.paket', $id) }}" method="POST">
            @csrf
            <input type="text" name="paket" id="" value="{{ $id }}" hidden>
            <button type="submit" class="btn btn-warning btn-daftar">DAFTAR SEKARANG</button>
        </form>
    </div>
    
</div>
