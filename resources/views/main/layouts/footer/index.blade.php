{{-- Footer --}}
<div class="container-fluid footer">
    <div class="row text-white">
        <div class="col-lg-6 text-center">
            <img src="{{ asset('img/jadi-putih.png') }}" alt="" width="45%">
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 my-5" style="margin-top: 80px;">
                    <h3 class="teks-header text-center text-white"><u>BANDUNG PUBLIC SERVICE</u></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-footer">
                        <li class="teks-header-2">
                            <a href="#" class="text-decoration-none text-white">
                                HALAMAN UTAMA
                            </a>
                        </li>
                        @if (Auth::guard('user')->check())
                            <li class="teks-header-2">
                                <a href="/laporan" class="text-decoration-none text-white">
                                    PENGADUAN
                                </a>
                            </li>
                        @elseif (Auth::guard('petugas')->check())
                            <li class="teks-header-2">
                                <a href="/laporan" class="text-decoration-none text-white">
                                    PENGADUAN
                                </a>
                            </li>
                        @elseif (Auth::guard('masyarakat')->check())
                            <li class="teks-header-2">
                                <a href="/laporan" class="text-decoration-none text-white">
                                    PENGADUAN
                                </a>
                            </li>
                        @endif
                        <li class="teks-header-2">
                            <a href="/about" class="text-decoration-none text-white">
                                TENTANG KAMI
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-footer">
                        <li class="teks-header-2">BANDUNG PUBLIC SERVICE</li>
                        <li class="teks-header-2">bpse@rocketmail.com</li>
                        <li class="teks-header-2">+62 896 8123 8317</li>
                        <li class="teks-header-2">Jl. Yang lurus No. 12 Rt 01/ Rw 04, Cikancung, Bandung selatan</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center py-2">
                <small class="text-muted">Copyright 2023. All Right Has Been Reserved</small>
            </div>
        </div>
    </div>
</div>
