<style>
    .btn-daftar{
        background: linear-gradient(to bottom, #3EC8AC, #4E90A4);
        color: white;
        border: none;
    }
    .btn-daftar:hover{
        color: papayawhip;
    }
    .form-button{
        position: absolute;
        bottom: 30;
        left: 10;
        right: 0;
    }
</style>
<div class="linear-bg mx-auto py-4 px-3 text-center">
    <h3 class="my-5">{{ $title }}</h3>
    <h1 class="my-5">Rp {{ $harga }},-</h1>
    <ul class="text-left">
        @foreach ($point as $item)
        <li>{{ $item }}</li>
        @endforeach

    </ul>
    <form class="form-button" action="{{ route('landing.paket', $id) }}" method="POST">
        @csrf
        <input type="text" name="paket" id="" value="{{ $id }}" hidden>
        <button type="submit" class="btn btn-warning btn-daftar">DAFTAR SEKARANG</button>
    </form>
</div>
