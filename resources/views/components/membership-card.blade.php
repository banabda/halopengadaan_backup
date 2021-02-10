<style>
    .btn-daftar{
        background: linear-gradient(to bottom, #3EC8AC, #4E90A4);
        color: white;
        border: none;
    }
    .btn-daftar:hover{
        color: papayawhip;
    }
</style>
<div class="linear-bg mx-auto py-4 px-3 text-center">
    <h3 class="my-5">{{ $title }}</h3>
    <h1 class="my-5">Rp {{ $harga }},-</h1>
    <ul class="text-left my-5">
        @foreach ($point as $item)
        <li>{{ $item }}</li>
        @endforeach
        
    </ul>
    <button type="button" class="btn btn-warning my-5 btn-daftar">DAFTAR SEKARANG</button>
</div>
