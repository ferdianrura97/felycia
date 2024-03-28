<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            {{-- <img src="{{ asset('assets/img/logo/logo2.png') }}"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">{{ \Helper::getNamaProfil() }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>

    @if(\Helper::hakAkses('Penjualan','View'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penjualan.index') }}">
            <i class="fas fa-money-check"></i>
            <span>Penjualan</span>
        </a>
    </li>
    @endif

    @if(\Helper::hakAkses('Pelanggan','View'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pelanggan.index') }}">
            <i class="fas fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>
    @endif

    @if(\Helper::hakAkses('Kategori Barang','View'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-bookmark"></i>
            <span>Kategori Barang</span>
        </a>
    </li>
    @endif

    @if(\Helper::hakAkses('Barang','View'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-box"></i>
            <span>Barang</span>
        </a>
    </li>
    @endif

    @if(\Helper::hakAkses('User Management','View'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
        aria-controls="collapseUser">
        <i class="fas fa-fw fa-user"></i>
        <span>Management User</span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="{{ route('level.index') }}">Level</a>
            <a class="collapse-item" href="{{ route('user.index') }}">User</a>
        </div>
    </div>
    </li>
    @endif

    @if(\Helper::hakAkses('Laporan','View'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true"
        aria-controls="collapseLaporan">
        <i class="fas fa-fw fa-book"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseLaporan" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Laporan</h6>
            <a class="collapse-item" href="{{ url('laporan/penjualan') }}">Penjualan</a>
            <a class="collapse-item" href="{{ url('laporan/pelanggan') }}">Pelanggan</a>
            <a class="collapse-item" href="{{ url('laporan/barang') }}">Barang</a>
        </div>
    </div>
    </li>
    @endif
    
</ul>