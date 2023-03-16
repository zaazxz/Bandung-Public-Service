@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Pengaduan
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman list laporan pengaduan milik {{ Auth::guard('masyarakat')->user()->nama }}
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
        <div class="row">
            <hr>
            <div class="col-lg-12 mt-3">
                <div class="row">
                    @forelse ($reports as $laporan)
                        @if (!$laporan->user_id || !$laporan->petugas_id)
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
                                            <small class="text-primary"><b>{{ $laporan->masyarakat->nama }}</b></small>
                                            <p class="card-text">
                                                {{ $laporan->laporan }}
                                            </p>
                                            @if ($laporan->status == 'Menunggu')
                                                <div class="row">
                                                <div class="col-4">
                                                    <div class="d-grid gap-2">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $laporan->id }}">
                                                            Ubah Laporan
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-grid gap-2">
                                                        <a href="/laporan/{{ $laporan->id }}" class="btn btn-success">
                                                            Lihat Laporan
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-grid gap-2">
                                                        <form action="/laporan/{{ $laporan->id }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="d-grid gap-2">
                                                                <button onclick="return confirm('Kamu Yakin?')"
                                                                    class="btn btn-danger">
                                                                    Hapus
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="d-grid gap-2">
                                                        <a href="/laporan/{{ $laporan->id }}" class="btn btn-success">
                                                            Lihat Laporan
                                                        </a>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-grid gap-2">
                                                        <form action="/laporan/{{ $laporan->id }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="d-grid gap-2">
                                                                <button onclick="return confirm('Kamu Yakin?')"
                                                                    class="btn btn-danger">
                                                                    Hapus
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal --}}
                            <div class="modal fade" id="exampleModal{{ $laporan->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Laporan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/laporan/{{ $laporan->id }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">

                                                {{-- Hidden  --}}
                                                <input type="hidden" name="status" value="Menunggu">
                                                <input type="hidden" name="masyarakat_id"
                                                    value="{{ Auth::guard('masyarakat')->user()->id }}">

                                                <div class="row">
                                                    <div class="col-lg-6">

                                                        {{-- Pratinjau Gambar --}}
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="contact-info-vertical">Pratinjau Gambar</label>
                                                                <div
                                                                    class="container border rounded py-3 d-flex justify-content-center">
                                                                    @if ($laporan->gambar)
                                                                        <img src="{{ asset('storage/' . $laporan->gambar) }}"
                                                                            alt="" srcset=""
                                                                            style="max-width: 325px;" id="imgPreview">
                                                                    @else
                                                                        <img id="imgPreview" src="#" alt="your image"
                                                                            style="max-width: 325px;" />
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Input Gambar --}}
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="gambar">Gambar</label>
                                                                <input
                                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                                    type="file" id="gambar" name="gambar"
                                                                    onchange="previewImage()"
                                                                    value="{{ old('gambar') }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        {{-- Textarea Deskripsi Laporan --}}
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="laporan">Deskripsi
                                                                    Laporan</label>
                                                                <textarea class="form-control" id="laporan" style="height: 250px;" name="laporan"
                                                                    value="{{ old('laporan', $laporan->laporan) }}">{{ $laporan->laporan }}</textarea>
                                                            </div>
                                                        </div>

                                                        {{-- Identitas Penulis --}}
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">Identitas
                                                                    Penulis</label>
                                                                <div class="row mt-1 py-1">
                                                                    <div class="col-6">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="identitas" id="identitas"
                                                                                value="1"
                                                                                {{ $laporan->identitas == '1' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="identitas">
                                                                                Tampilkan
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="identitas" id="identitas"
                                                                                value="0"
                                                                                {{ $laporan->identitas == '0' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="identitas">
                                                                                Sembunyikan
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <div class="row border" style="width: 100%">
                                                    <div class="col-6">
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-grid gap-2">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="mb-4 text-muted text-center">Tidak ada laporan.</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="mb-4 text-muted text-center">
                                    <div class="d-grid gap-2">
                                        <a href="/#pengaduan" class="btn btn-success">Buat Pengaduan</a>
                                    </div>
                                </h3>
                            </div>
                        </div>   
                    @endforelse
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
