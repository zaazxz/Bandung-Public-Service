@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Pengaduan
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman list laporan pengaduan milik seluruh pengguna Bandung Public Service
@endsection

@section('content')
    <div class="container mt-5 mb-3">
        <h1 class="teks-header text-center">LAPORAN PENGADUAN</h1>
        <p class="teks-header-2">
            Laporan dibagi menjadi 4 jenis berdasarkan <span class="text-primary">status</span> dari laporan tersebut,
            dimulai dari laporan yang baru saja dibuat oleh pengguna akan berstatus <span
                class="text-primary">"Menunggu"</span>
            yang berarti laporan tersebut berada dalam tahapan verifikasi untuk diperiksa kesesuaian dari laporan tersebut.
            Lalu laporan dengan status <span class="text-primary">"Diproses"</span> yang berarti bahwa laporan tersebut sudah
            diperiksa
            kesesuaiannya, dan sudah dalam proses penanganan. Berikutnya laporan dengan status <span
                class="text-primary">"Selesai</span>
            yang berarti laporan tersebut sudah selesai ditangani oleh pihak berwenang, pada status ini petugas akan
            memberikan balasan untuk
            laporan yang sudah dibuat. Dan status terakhir adalah <span class="text-primary">"Ditolak</span>, yakni pada
            proses
            <span class="text-primary">"Menunggu"</span> ditemukan ketidak sesuaian laporan sehingga laporan tidak dapat
            ditangani oleh pihak berwenang.
        </p>
    </div>

    <div class="container my-5">
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <form action="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="col-lg-12 mt-3">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid"
                                    src="{{ asset('img/final-dl.beatsnoop.com-a4jIf7v5KE.jpg') }}" alt="Card image cap"
                                    style="height: 20rem" />
                                <div class="card-body">
                                    <h4 class="card-title">Top Image Cap</h4>
                                    <p class="card-text">
                                        Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                        pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie
                                        chocolate
                                        bar
                                        chocolate tart dragée.
                                    </p>
                                    <p class="card-text">
                                        Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                                    </p>
                                    <button class="btn btn-primary block">Update now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
