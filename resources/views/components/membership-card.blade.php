<div class="linear-bg mx-auto py-4 px-3 text-center">
    <h3 class="my-5">{{ $title }}</h3>
    <h1 class="my-5">Rp {{ $harga }},-</h1>
    <ul class="text-left my-5">
        @foreach ($point as $item)
        <li>{{ $item }}</li>
        @endforeach

    </ul>
    <form action="{{ route('landing.paket', $id) }}" method="post">
        <input type="text" name="" id="" value="{{ $id }}" hidden>
        <button type="button" class="btn btn-warning my-5">DAFTAR SEKARANG</button>
    </form>
</div>
