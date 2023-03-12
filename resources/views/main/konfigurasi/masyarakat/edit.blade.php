@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Profil Edit
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman konfigurasi profil pengguna website Public Service Bandung
@endsection

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="bg-primary card-header">
                <h4 class="text-center teks-header text-white">FORM KONFIGURASI PROFIL USER</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" action="/konfigurasi/masyarakat/{{ $masyarakat->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" placeholder="Nama Lengkap" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $masyarakat->nama) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" placeholder="Email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $masyarakat->email) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan</label>
                                    <input type="number" id="nik" placeholder="Nomor Induk Kependudukan"
                                        name="nik" class="form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik', $masyarakat->nik) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="telp">Nomor Telepon</label>
                                    <input type="number" id="telp" placeholder="Nomor Telepon" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ old('telp', $masyarakat->telp) }}" required>
                                </div>
                            </div>
                            <input type="hidden" id="username" placeholder="Username" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ $masyarakat->username }}">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            <input type="hidden" id="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password', $masyarakat->password) }}" disabled>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tmpt_lahir">Tempat Kelahiran</label>
                                    <input type="text" id="tmpt_lahir" placeholder="Tempat Kelahiran"
                                        class="form-control @error('tmpt_lahir') is-invalid @enderror"
                                        value="{{ old('tmpt_lahir', $masyarakat->tmpt_lahir) }}"
                                        name="tmpt_lahir">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" placeholder="Tanggal Lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        value="{{ old('tgl_lahir', $masyarakat->tgl_lahir) }}" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact-info-vertical">Pratinjau Gambar</label>
                                    <div class="container border mt-2 py-3 d-flex justify-content-center">
                                        @if ($masyarakat->gambar)
                                            <img src="{{ asset('storage/' . $masyarakat->gambar) }}" alt="no-picture"
                                                id="imgPreview" style="max-width: 400px;" />
                                        @else
                                            <img id="imgPreview" src="#" alt="your image"
                                                style="max-width: 400px;" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                        id="gambar" name="gambar" value="{{ old('gambar', $masyarakat->gambar) }}"
                                        onchange="previewImage()">
                                </div>
                                @error('gambar')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat"
                                    value="{{ old('alamat', $masyarakat->alamat) }}">{{ $masyarakat->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
