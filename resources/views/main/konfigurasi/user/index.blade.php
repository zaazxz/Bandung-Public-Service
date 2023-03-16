@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            @if (Auth::guard('user')->user()->gambar)
                <img src="{{ asset('storage/' . Auth::guard('user')->user()->gambar) }}" alt="no-picture"
                    style="max-width: 200px;" class="rounded ms-5" />
            @else
                <img src="{{ asset('img/400x400.png') }}" alt="" style="max-width: 220px;" class="rounded ms-5">
            @endif
        </div>
        <div class="col-lg-8">
            <div class="card-body p-2">
                <ul class="list-group">
                    <li class="list-group-item active text-center"><b>DATA ADMINISTRATOR</b></li>

                    {{-- Nama Lengkap --}}
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4">Nama : </div>
                            <div class="col-sm-8">
                                {{ Auth::guard('user')->user()->nama }}
                            </div>
                        </div>
                    </li>

                    {{-- Email --}}
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4">E-Mail : </div>
                            <div class="col-sm-8">
                                {{ Auth::guard('user')->user()->email }}
                            </div>
                        </div>
                    </li>

                    {{-- Nomor Telepon --}}
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4">Nomor Telepon : </div>
                            <div class="col-sm-8">
                                {{ Auth::guard('user')->user()->telp }}
                            </div>
                        </div>
                    </li>

                    {{-- Alamat --}}
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4">Alamat : </div>
                            <div class="col-sm-8">
                                @if (!Auth::guard('user')->user()->alamat)
                                    -
                                @elseif (Auth::guard('user')->user()->alamat)
                                    {{ Auth::guard('user')->user()->alamat }}
                                @endif
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12 mx-auto my-5">
            <div class="d-grid gap-2">

                {{-- Button --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ Auth::guard('user')->user()->id }}">
                    Edit Data Profil
                </button>

                {{-- Modal Edit --}}
                <div class="modal fade" id="exampleModal{{ Auth::guard('user')->user()->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
                            </div>
                            <div class="modal-body">
                                <form action="/dashboard/konfigurasi/user/{{ Auth::guard('user')->user()->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    

                                    <div class="row">

                                        {{-- Input --}}
                                        <div class="col-lg-6">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama lengkap</label>
                                                    <input type="text" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Masukkan Nama Lengkap" name="nama"
                                                        value="{{ old('nama', Auth::guard('user')->user()->nama) }}"
                                                        required>
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email">E-mail</label>
                                                    <input type="text" id="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Masukkan E-Mail" name="email"
                                                        value="{{ old('email', Auth::guard('user')->user()->email) }}"
                                                        required>
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" id="username"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        placeholder="Masukkan Username" name="username"
                                                        value="{{ old('usename', Auth::guard('user')->user()->username) }}"
                                                        required>
                                                    @error('username')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="telp">telp</label>
                                                    <input type="number" id="telp"
                                                        class="form-control @error('telp') is-invalid @enderror"
                                                        placeholder="Masukkan Nomor Telepon" name="telp"
                                                        value="{{ old('usename', Auth::guard('user')->user()->telp) }}"
                                                        required>
                                                    @error('telp')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Gambar --}}
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12 mt-4">
                                                    <div
                                                        class="container border rounded py-3 d-flex justify-content-center">
                                                        @if (Auth::guard('user')->user()->gambar)
                                                            <img src="{{ asset('storage/' . Auth::guard('user')->user()->gambar) }}"
                                                                alt="" srcset="" style="max-width: 200px;"
                                                                id="imgPreview">
                                                        @else
                                                            <img id="imgPreview" src="#" alt="your image"
                                                                style="max-width: 200px;" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="gambar">Gambar</label>
                                                            <input
                                                                class="form-control @error('gambar') is-invalid @enderror"
                                                                type="file" id="gambar" name="gambar"
                                                                onchange="previewImage()" value="{{ old('gambar') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- Alamat --}}
                                        <div class="col-lg-12">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"
                                                value="{{ old('alamat', Auth::guard('user')->user()->alamat) }}">{{ Auth::guard('user')->user()->alamat }}</textarea>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
