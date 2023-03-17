@extends('main.layouts.index')

@section('content')
    {{-- Header Title Banner --}}
@section('header-title')
    Selamat Datang!
@endsection

{{-- Header Description Banner --}}
@section('header-desc')

    {{-- Guest --}}
    @if (!Auth::guard('user')->check() && !Auth::guard('petugas')->check() && !Auth::guard('masyarakat')->check())
    Silahkan daftar atau masuk untuk dapat menggunakan fitur-fitur Bandung Public Service

        {{-- Admin --}}
    @elseif (Auth::guard('user')->check())
        Selamat datang <b>{{ Auth::guard('user')->user()->nama }}</b>! Silahkan gunakan fitur-fitur dari website Bandung
        Public Service

        {{-- Petugas --}}
    @elseif (Auth::guard('petugas')->check())
        Selamat datang <b>{{ Auth::guard('petugas')->user()->nama }}</b>! Silahkan gunakan fitur-fitur dari website Bandung
        Public Service

        {{-- Masyarakat --}}
    @elseif (Auth::guard('masyarakat')->check())
        Selamat datang <b>{{ Auth::guard('masyarakat')->user()->nama }}</b>! Silahkan gunakan fitur-fitur dari website
        Bandung Public Service
    @endif

@endsection

@section('content')
    {{-- About Us --}}
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 mt-4">
                <h1 class="teks-header">
                    APA ITU <br> <span class="text-primary">BANDUNG PUBLIC SERVICE?</span>
                </h1>
                <p class="teks-header-2">
                    <span class="text-primary fw-bold">Bandung Public Service</span> adalah sebuah platform website yang
                    bertujuan untuk mempermudah masyarakat untuk menyampaikan saran serta keluhan. Selain itu, <span
                        class="text-primary fw-bold">Bandung Public Service</span> juga dibuat dengan tujuan mempermudah
                    instansi pelayanan masyarakat dalam melayani masyarakat.
                </p>
                <a class="btn btn-primary px-5 rounded-0" href="/about">
                    Selengkapnya <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6 my-1">
                <div class="row">
                    <div class="col-lg-6 text-center mt-2">
                        <img src="{{ asset('img/1.jpg') }}" alt="" width="100%">
                    </div>
                    <div class="col-lg-6 text-center mt-2">
                        <img src="{{ asset('img/2.jpg') }}" alt="" width="100%">
                    </div>
                    <div class="col-lg-6 text-center mt-2">
                        <img src="{{ asset('img/3.jpg') }}" alt="" width="100%">
                    </div>
                    <div class="col-lg-6 text-center mt-2">
                        <img src="{{ asset('img/4.jpg') }}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Step By Step --}}
    <div class="container-fluid step">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 my-3">
                    <div class="mx-auto glassmorphism p-3" style="width: 100%;">
                        <div class="text-center my-2">
                            <span class="fa-stack fa-3x">
                                <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                <i class="fa-solid fa-pen-to-square fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center teks-header">Menulis Laporan</h3>
                            <p class="card-text teks-header-2">
                                Masyarakat memberikan saran atau keluhan melalui platform website Bandung Public Service
                                beserta deskripsi lengkap keluhan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="mx-auto glassmorphism p-3" style="width: 100%;">
                        <div class="text-center my-2">
                            <span class="fa-stack fa-3x">
                                <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                <i class="fa-solid fa-share fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center teks-header">Proses Pengerjaan</h3>
                            <p class="card-text teks-header-2">
                                Laporan akan divalidasi dan diverifikasi. jika dirasa laporan sudah terbukti kebenarannya,
                                laporan akan ditangani dalam jangka waktu 2-7 hari waktu pengerjaan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="mx-auto glassmorphism p-3" style="width: 100%;">
                        <div class="text-center my-2">
                            <span class="fa-stack fa-3x">
                                <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                <i class="fa-solid fa-check-double fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center teks-header">Penyelesaian</h3>
                            <p class="card-text teks-header-2">
                                Laporan ataupun keluhan sudah selesai ditangani oleh pihak yang berwenang. status laporan
                                akan diubah menjadi selesai dan pihak terkait akan memberikan laporan sebagai bukti
                                pengerjaan telah selesai
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pengaduan --}}
    <div class="container-fluid my-5" id="pengaduan">

        {{-- Guest --}}
        @if (!Auth::guard('user')->check() && !Auth::guard('petugas')->check() && !Auth::guard('masyarakat')->check())
        <h1 class="teks-header text-center">
            JUMLAH PENGADUAN SAAT INI <br>
        </h1>
        <div class="text-center teks-header" style="font-size: 100px;">{{ $data->count() }}</div>
        <h2 class="teks-header text-center">AYO BANGUN BANDUNG BERSAMA!</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="d-grid gap-2">
                        <a href="/masuk" class="btn btn-primary">Buat Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Masyrakat --}}
        @elseif (Auth::guard('masyarakat')->check())
            <div class="container">
                <div class="card mt-3">
                    <div class="card-header bg-primary">
                        <h4 class="text-center teks-header text-white">PENGADUAN FORM</h4>
                    </div>
                    <hr class="my-0">
                    <div class="card-content pengaduan">
                        <div class="card-body">
                            <form class="form" action="/laporan" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="Menunggu">
                                <input type="hidden" name="masyarakat_id" value="{{ Auth::guard('masyarakat')->user()->id }}">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                                    <label for="judul" class="text-white">Judul</label>
                                                    <input type="text" id="judul"
                                                        class="form-control @error('judul') is-invalid @enderror"
                                                        placeholder="Masukkan judul Lengkap" name="judul"
                                                        value="{{ old('judul') }}"
                                                        required>
                                                    @error('judul')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                    </div>

                                    {{-- Textarea Deskripsi Laporan --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-white" for="laporan">Deskripsi Laporan</label>
                                            <textarea class="form-control" id="laporan" style="height: 250px;" name="laporan" required></textarea>
                                        </div>
                                    </div>

                                    {{-- Pratinjau Gambar --}}
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white" for="contact-info-vertical">Pratinjau Gambar</label>
                                            <div class="container border mt-2 py-3 d-flex justify-content-center">
                                                <img id="imgPreview" src="{{asset('img/1200x720.png')}}" alt="your image"
                                                    style="max-width: 400px;" />
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Input Gambar --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-white" for="gambar">Gambar</label>
                                            <input class="form-control @error('gambar') is-invalid @enderror"
                                                type="file" id="gambar" name="gambar" onchange="previewImage()"
                                                value="{{ old('gambar') }}">
                                        </div>
                                    </div>

                                    {{-- Identitas Penulis --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group text-white">
                                            <label class="text-white" for="first-name-column">Identitas Penulis</label>
                                            <div class="row mt-1 py-1">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="identitas"
                                                            id="identitas" value="1" checked>
                                                        <label class="form-check-label" for="identitas">
                                                            Tampilkan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="identitas"
                                                            id="identitas" value="0">
                                                        <label class="form-check-label" for="identitas">
                                                            Sembunyikan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        {{-- Petugas --}}
        @elseif (Auth::guard('petugas')->check())
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="d-grid gap-2">
                        <a href="/dashboard" class="btn btn-primary">Pergi Ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Admin --}}
        @elseif (Auth::guard('user')->check())
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="d-grid gap-2">
                        <a href="/dashboard" class="btn btn-primary">Pergi Ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection
