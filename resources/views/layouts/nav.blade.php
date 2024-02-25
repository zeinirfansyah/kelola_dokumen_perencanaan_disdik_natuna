<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>Perancanaan Disdik Natuna</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- add navigation -->
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.lkjip') }}">LKJIP</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.spmp') }}">SPM Pendidikan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.pkrkt') }}">PK & RKT</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.peraturan') }}">Peraturan Pendidikan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        Log out
                      </a>
            
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>