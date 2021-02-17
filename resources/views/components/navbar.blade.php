<nav class="fixed-top navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/lpkn-logo.png') }}" style="height: 30px;" alt="logo">
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
                        <a class="nav-link" href="">{{ __('Tentang Kami') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">{{ __('Artikel') }}</a>
                    </li>
                    <li class="nav-item mx-2">

                        <a class="nav-link" href="#">{{ __('Regulasi') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">{{ __('Profil Praktisi Pengadaan') }}</a>
                    </li>
                    <li class="nav-item mx-2 dropdown">
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
                                <a id="dropdown-item" class="nav-link dropdown-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownLayanan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Layanan') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownLayanan">
                            <a class="dropdown-item" href="#">{{ __('Pelatihan Pengadaan') }}</a>
                            <a class="dropdown-item" href="#">{{ __('Buku Pengadaan') }}</a>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>
