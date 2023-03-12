@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Tentang Kami
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman penjelasan mengenai terciptanya aplikasi pelayanan masyarakat berbasis website Bandung Public Service
@endsection

@section('content')
    {{-- About Us --}}
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 text-center">
                <img src="{{ asset('img/jadi-hitam.png') }}" alt="" width="50%">
            </div>
            <div class="col-lg-9">
                <p class="teks-header-2 mt-3">
                    <span class="fw-bold text-primary">Bandung Public Service</span> adalah sebuah aplikasi pelayanan masyarakat berbasis website yang dibuat dengan tujuan mempermudah masyarakat untuk memberikan aspirasi dan laporan, juga mempermudah instansi-instansi yang berwenang untuk mendapatkan informasi dengan cepat dan menangani keluhan dari masyarakat secepat dan sebaik mungkin.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <p class="teks-header-2 mt-3">
                    <span class="fw-bold text-primary">Bandung Public Service</span> dikembangkan oleh siswa SMK Bakti Nusantara 666 menggunakan teknologi framework Laravel 9 dan framework Bootstrap 5. Pembuatan dan pengembangan dilakukan oleh <span class="text-primary fw-bold">Mirza Qamaruzzaman</span>, siswa kelas XII RPL 4 tahun ajaran 2023 dengan waktu kurang lebih 15 hari pengerjaan. adapun pembuatan dan pengembangan aplikasi pengaduan dan pelayanan masyarakat ini, pada awalnya ditujukan untuk menyelesaikan <span class="text-primary fw-bold">UKK (Ujian Kompetensi Keahlian)</span> tahun ajaran 2023, di SMK Bakti Nusantara 666.
                </p>
            </div>
            <div class="col-lg-3 text-center">
                <img src="{{ asset('img/laravel-logo.png') }}" alt="" width="50%">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center pt-2 mt-3">
                <img src="{{ asset('img/foto.jpg') }}" alt="" width="100%" class="rounded">
            </div>
            <div class="col-lg-8 pt-2 mt-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Mirza Qamaruzzaman (Zaazxz)</h4>
                        <p class="text-center">
                            Skill dan Penguasaan Bahasa
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="progress progress-primary progress-lg mb-4">
                            <div
                            class="progress-bar progress-label"
                            role="progressbar"
                            style="width: 65%;"
                            aria-valuenow="65"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            Hypertext Preprocessor (PHP)
                            </div>
                        </div>
                        <div class="progress progress-warning progress-lg mb-4">
                            <div
                            class="progress-bar progress-label"
                            role="progressbar"
                            style="width: 35%;"
                            aria-valuenow="35"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            JavaScript
                            </div>
                        </div>
                        <div class="progress progress-warning progress-lg mb-4">
                            <div
                            class="progress-bar progress-label"
                            role="progressbar"
                            style="width: 80%; background-color: orange;"
                            aria-valuenow="80"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            Hypertext Markup Language (HTML)
                            </div>
                        </div>
                        <div class="progress progress-warning progress-lg mb-4">
                            <div
                            class="progress-bar progress-label"
                            role="progressbar"
                            style="width: 90%; background-color: lightblue;"
                            aria-valuenow="90"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            Cascading Style Sheet (CSS)
                            </div>
                        </div>
                        <div class="progress progress-danger progress-lg mb-4">
                            <div
                            class="progress-bar progress-label"
                            role="progressbar"
                            style="width: 60%;"
                            aria-valuenow="60"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            Laravel Framework
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="teks-header-2">
                    Aplikasi pelayanan masyarakat berbasis website <span class="text-primary fw-bold">Bandung Public Service</span> ini masih belum layak untuk disebut selesai. masih banyak nya kekurangan dan masih banyak nya potensi aplikasi ini untuk dikembangkan lebih jauh lagi pada masa yang akan datang. oleh karena itu, untuk membantu <span class="text-primary fw-bold">Bandung Public Service</span> menjadi platform pengaduan yang lebih baik lagi, diharapkan kritik serta saran yang membangun dari seluruh pengguna platform ini.
                </p>
            </div>
        </div>
    </div>
@endsection
