@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Pengaduan
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman Detail Laporan Pengaduan
@endsection

@section('content')
    <div class="container">
        <div class="row">

            {{-- Detail Penulis --}}
            <div class="col-lg-12 mt-3">
                <p>
                    @if ($laporan->identitas == '1')
                        Ditulis Oleh : {{ $laporan->masyarakat->nama }}
                    @else
                        Ditulis Oleh : Anonymous
                    @endif
                    <br>
                    Ditulis Pada : {{ $laporan->updated_at }}
                    <br>
                    @if ($laporan->status == 'Menunggu')
                        Status Penanganan : <span class="text-primary">{{ $laporan->status }}</span>
                    @elseif ($laporan->status == 'Diproses')
                        Status Penanganan : <span class="text-warning">{{ $laporan->status }}</span>
                    @elseif ($laporan->status == 'Selesai')
                        Status Penanganan : <span class="text-success">{{ $laporan->status }}</span>
                    @elseif ($laporan->status == 'Ditolak')
                        Status Penanganan : <span class="text-danger">{{ $laporan->status }}</span>
                    @endif
                </p>
            </div>

            {{-- Gambar --}}
            <div class="col-lg-6 mb-3 mx-auto">
                @if ($laporan->gambar)
                    <img src="{{ asset('storage/' . $laporan->gambar) }}" alt="" srcset="" width="100%"
                        class="rounded">
                @else
                    <img src="{{ asset('img/1200x720.png') }}" alt="" width="100%" class="rounded">
                @endif
            </div>
            <div class="col-lg-6 mx-auto">
                <h4>Isi Laporan : </h4>
                <p>{{ $laporan->laporan }}</p>
            </div>

            @if ($laporan->masyarakat_id == Auth::guard('masyarakat')->user()->id)
                <div class="col-lg-12">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $laporan->id }}">
                            Ubah Laporan
                        </button>
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

            <hr class="my-3">

            @if ($laporan->user_id || $laporan->petugas_id)
                ayam
            @else
                <h3 class="text-muted text-center mb-3">Laporan Belum Ditindak Lanjuti.</h3>
            @endif

        </div>
    </div>
@endsection
