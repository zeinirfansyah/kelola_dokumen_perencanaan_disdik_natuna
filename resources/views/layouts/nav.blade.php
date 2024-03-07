<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <strong>SIMBEK</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto">

        <li class="nav-item"><a class="nav-link" href="{{ route('landing.lkjip') }}">LKJIP</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('landing.spmp') }}">SPM Pendidikan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('landing.pkrkt') }}">PK & RKT</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('landing.peraturan') }}">Peraturan Pendidikan</a></li>
        <!-- Dropdown menu for the remaining items -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dokumen Lainnya
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{ route('landing.sapras') }}">Sarana & Prasarana</a>
            <a class="dropdown-item" href="{{ route('landing.kdp') }}">KDP</a>
            <a class="dropdown-item" href="{{ route('landing.musrenbangkab') }}">Musrenbangkab</a>
            <a class="dropdown-item" href="{{ route('landing.renja') }}">Renja DIknas</a>
            <a class="dropdown-item" href="{{ route('landing.rkpd') }}">RKPD</a>
            <a class="dropdown-item" href="{{ route('landing.dpa') }}">DPA</a>
            <a class="dropdown-item" href="{{ route('landing.lrfk') }}">LRFK</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Galeri & Kontak
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{ route('landing.galery') }}">Galeri</a>
            <a class="dropdown-item" href="{{ route('landing.contact') }}">Kontak</a>
          </div>
        </li>
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
