<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            {{-- Toggle Button --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Dropdown Profile --}}
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            @if (Auth::guard('user')->check())
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">
                                        {{ Auth::guard('user')->user()->nama }}
                                    </h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        @if (Auth::guard('user')->user()->gambar)
                                            <img src="{{ asset('storage/' . Auth::guard('user')->user()->gambar) }}"
                                                alt="" srcset="">
                                        @else
                                            <img src="{{ asset('img/100x100.png') }}">
                                        @endif
                                    </div>
                                </div>
                            @elseif (Auth::guard('petugas')->check())
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">
                                        {{ Auth::guard('petugas')->user()->nama }}
                                    </h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        @if (Auth::guard('petugas')->user()->gambar)
                                            <img src="{{ asset('storage/' . Auth::guard('petugas')->user()->gambar) }}"
                                                alt="" srcset="">
                                        @else
                                            <img src="{{ asset('img/100x100.png') }}">
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        @if (Auth::guard('user')->check())
                            <li>
                                <h6 class="dropdown-header">Halo, {{ Auth::guard('user')->user()->nama }}</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/dashboard/konfigurasi/user">
                                    <i class="icon-mid bi bi-person me-2"></i>
                                    Konfigurasi Profil
                                </a>
                            </li>
                        @endif

                        <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post" class="text-center">
                                @csrf
                                <button type="submit" class="btn btn-danger" ><i class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</header>
