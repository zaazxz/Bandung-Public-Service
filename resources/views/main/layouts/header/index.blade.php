<div class="container-fluid header">

    {{-- Banner : Start --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-white" style="margin-top: 30vh;">
                <h1 class="teks-header text-white">
                    @yield('header-title')
                </h1>
                <p class="teks-header-2">
                    @yield('header-desc')
                </p>
                @if (!Auth::guard('user')->check() && !Auth::guard('petugas')->check() && !Auth::guard('masyarakat')->check())
                    <div class="row">
                        <div class="col-sm-4 my-1">
                            <div class="d-grid gap-2">
                                <a href="/masuk" class="btn btn-primary">Masuk</a>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="d-grid gap-2">
                                <a href="/daftar" class="btn btn-primary">Daftar</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- Banner : End --}}

</div>

<div id="main" class="layout-horizontal sticky-top">
    <header class="mb-5">
        <div class="header-top" style="background-color: rgba(255, 255, 255, 0.7)">
            <div class="container">
                <a href="/" class="text-decoration-none teks-header">
                    <img src="{{ asset('img/jadi-hitam.png') }}" alt="" width="40px">
                </a>
                <div class="header-top-right">

                    {{-- Guest --}}
                    @if (!Auth::guard('user')->check() && !Auth::guard('petugas')->check() && !Auth::guard('masyarakat')->check())
                        <a href="/masuk" class="btn btn-primary px-5">Masuk</a>
                        <a href="/daftar" class="btn btn-primary px-5">Daftar</a>
                    @endif

                    {{-- Admin --}}
                    @if (Auth::guard('user')->check())
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar" />
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ Auth::guard('user')->user()->username }}</h6>
                                    <p class="user-dropdown-status text-sm text-muted">
                                        {{ Auth::guard('user')->user()->nama }}
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        {{-- Petugas --}}
                    @elseif (Auth::guard('petugas')->check())
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar" />
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ Auth::guard('petugas')->user()->nama }}</h6>
                                    <p class="user-dropdown-status text-sm text-muted">
                                        {{ Auth::guard('petugas')->user()->nama }}
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        {{-- Masyarakat --}}
                    @elseif (Auth::guard('masyarakat')->check())
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    @if (Auth::guard('masyarakat')->user()->gambar)
                                        <img src="{{ asset('storage/' . Auth::guard('masyarakat')->user()->gambar) }}"
                                            alt="no-picture" alt="Avatar" />
                                    @elseif (!Auth::guard('masyarakat')->user()->gambar)
                                        <img src="{{ asset('img/50x50.png') }}" alt="Avatar" />
                                    @endif
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ Auth::guard('masyarakat')->user()->username }}
                                    </h6>
                                    <p class="user-dropdown-status text-sm text-muted">
                                        {{ Auth::guard('masyarakat')->user()->nama }}
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="/profil-masyarakat">Konfigurasi Profil</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    @endif

                </div>
            </div>
        </div>

        {{-- Admin --}}
        @if (Auth::guard('user')->check())
            <nav class="main-navbar" style="background-color: rgba(0,0,0,0.9)">
                <div class="container">
                    <ul>
                        <li class="menu-item">
                            <a href="/" class="menu-link">
                                <i class="fa-solid fa-house"></i>
                                <span>Halaman Utama</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="/about" class="menu-link">
                                <i class="fa-solid fa-users"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>
                        <li class="menu-item active has-sub">
                            <a href="/laporan" class="menu-link">
                                <i class="fa-solid fa-file-pen"></i>
                                <span>Laporan</span>
                            </a>
                            <div class="submenu">
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item">
                                            <a href="layout-default.html" class="submenu-link">Laporan Saya</a>
                                        </li>
                                        <li class="submenu-item">
                                            <a href="/laporan" class="submenu-link">Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Petugas --}}
        @elseif (Auth::guard('petugas')->check())
            <nav class="main-navbar" style="background-color: rgba(0,0,0,0.9)">
                <div class="container">
                    <ul>
                        <li class="menu-item">
                            <a href="/" class="menu-link">
                                <i class="fa-solid fa-house"></i>
                                <span>Halaman Utama</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="/about" class="menu-link">
                                <i class="fa-solid fa-users"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>
                        <li class="menu-item active has-sub">
                            <a href="/laporan" class="menu-link">
                                <i class="fa-solid fa-file-pen"></i>
                                <span>Laporan</span>
                            </a>
                            <div class="submenu">
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item">
                                            <a href="layout-default.html" class="submenu-link">Laporan Saya</a>
                                        </li>
                                        <li class="submenu-item">
                                            <a href="/laporan" class="submenu-link">Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Masyarakat --}}
        @elseif (Auth::guard('masyarakat')->check())
            <nav class="main-navbar" style="background-color: rgba(0,0,0,0.9)">
                <div class="container">
                    <ul>
                        <li class="menu-item">
                            <a href="/" class="menu-link">
                                <i class="fa-solid fa-house"></i>
                                <span>Halaman Utama</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="/about" class="menu-link">
                                <i class="fa-solid fa-users"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>
                        <li class="menu-item active has-sub">
                            <a href="/laporan" class="menu-link">
                                <i class="fa-solid fa-file-pen"></i>
                                <span>Laporan</span>
                            </a>
                            <div class="submenu">
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item">
                                            <a href="/laporan/detail" class="submenu-link">Laporan Saya</a>
                                        </li>
                                        <li class="submenu-item">
                                            <a href="/laporan" class="submenu-link">Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        @endif
    </header>
</div>
