<nav class="fixed-top navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/landing icon/logohalo.svg') }}" style="height: 30px;" alt="logo">
            {{-- asd --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-weight-bold">
                <!-- Authentication Links -->
                    <li class="nav-item mx-2">
                        <a class="nav-link" role="button" id="section-one-nav">{{ __('Tentang Kami') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="https://ilmu.lpkn.id/">{{ __('Artikel') }}</a>
                    </li>
                    <li class="nav-item mx-2">

                        <a class="nav-link" href="#">{{ __('Regulasi') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" role="button" id="section-three-nav">{{ __('Profil Praktisi Pengadaan') }}</a>
                    </li>
                    {{-- <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMembership" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Membership') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMembership">
                            @guest
                                @if (Route::has('login'))
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <a id="dropdown-item" href="{{ route('profile') }}" >
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            @endguest
                        </div>
                    </li> --}}
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownLayanan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Membership') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownLayanan">
                            @guest
                                @if (Route::has('login'))
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <a class="dropdown-item" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                            @endguest
                        </div>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownLayanan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Layanan') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownLayanan">
                            <a class="dropdown-item" href="https://lpkn.id/">{{ __('Pelatihan Pengadaan') }}</a>
                            <a class="dropdown-item" href="https://kelassmart.com/">{{ __('Buku Pengadaan') }}</a>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $("#section-one-nav").click(function() {
        // console.log(window.location.pathname)
        if (window.location.pathname == '/') {
            $('html, body').animate({
                scrollTop: $("#section-one").offset().top
            }, 1000);

        }
        else {
            window.location.href='/';
        }
    });
    $("#section-three-nav").click(function() {
        // console.log(window.location.pathname)
        if (window.location.pathname == '/') {
            $('html, body').animate({
                scrollTop: $("#section-three").offset().top
            }, 1000);

        }else {
            $(location).attr('href','/#section-three')
        }
    });
</script>
