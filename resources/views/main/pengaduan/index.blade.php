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
                    @foreach ($reports as $laporan)
                        @if ($laporan->status !== 'Ditolak')
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-content">
                                        @if ($laporan->gambar)
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('storage/' . $laporan->gambar) }}" alt="Card image cap"
                                                style="height: 20rem" />
                                        @else
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('img/final-dl.beatsnoop.com-a4jIf7v5KE.jpg') }}"
                                                alt="Card image cap" style="height: 20rem" />
                                        @endif
                                        <div class="card-body">
                                            <small class="text-muted">
                                                @if ($laporan->identitas == 1)
                                                    {{ $laporan->masyarakat->nama }}
                                                @else
                                                    Anonymous
                                                @endif
                                            </small>
                                            <p class="card-text mb-5">
                                                {{ $laporan->laporan }}
                                            </p>
                                            @if ($laporan->status == 'Menunggu')
                                                <small class="text-primary">{{ $laporan->status }}</small>
                                            @elseif ($laporan->status == 'Diproses')
                                                <small class="text-warning">{{ $laporan->status }}</small>
                                            @elseif ($laporan->status == 'Selesai')
                                                <small class="text-success">{{ $laporan->status }}</small>
                                            @elseif ($laporan->status == 'Ditolak')
                                                <small class="text-danger">{{ $laporan->status }}</small>
                                            @endif
                                            <hr>
                                            <div class="d-grid gap-2">
                                                <a href="/laporan/{{ $laporan->id }}" class="btn btn-primary">
                                                    Lihat Laporan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
