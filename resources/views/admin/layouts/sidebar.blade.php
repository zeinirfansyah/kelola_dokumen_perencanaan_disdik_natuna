<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-0">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light">File Management</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (auth()->user()->avatar)
          @if (auth()->user()->avatar === 'default_avatar.jpg')
            <img src="{{ asset('images/' . auth()->user()->avatar) }}"
              style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
          @else
            <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}"
              style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover"
              alt="{{ auth()->user()->avatar }}">
          @endif
        @else
          <img src="{{ asset('images/default_avatar.jpg') }}"
            style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
        @endif
      </div>
      <div class="info">
        <strong class="d-block">{{ auth()->user()->nama_user }}</strong>
       <span class="d-block">{{ ucfirst(auth()->user()->role) }}</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Master</li>
        <li class="nav-item">
          <a href="{{ route('lkjip.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>LKJIP</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('spmp.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>SPM Pendidikan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pkrkt.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>PK & RKT</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('peraturan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Peraturan Pendidikan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('sapras.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Sarana & Prasarana</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('galery.index') }}" class="nav-link">
            <i class="nav-icon fas fa-camera"></i>
            <p>Galeri</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('about.index') }}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Tentang Kami</p>
          </a>
        </li>
    
        <!-- superadmin role only -->
        @if (auth()->user()->role == 'superadmin')
          <li class="nav-header">Superadmin Only</li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User Manager</p>
            </a>
          </li>
        @endif

        </li>
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="{{ route('profile.show') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Log out</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
