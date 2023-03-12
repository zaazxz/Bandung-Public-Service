@extends('main.layouts.index')

{{-- Header Title Banner --}}
@section('header-title')
    Profil
@endsection

{{-- Header Description Banner --}}
@section('header-desc')
    Halaman konfigurasi profil pengguna website Public Service Bandung
@endsection

@section('content')

    {{-- Masyarakat --}}
    @if (Auth::guard('masyarakat')->check())
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 text-center mt-2">
                    @if (Auth::guard('masyarakat')->user()->gambar)
                        <img src="{{ asset('storage/' . Auth::guard('masyarakat')->user()->gambar) }}" alt="no-picture"
                            id="imgPreview" style="max-width: 400px;" width="85%" class="rounded"/>
                    @else
                        <img src="{{ asset('img/400x400.png') }}" alt="" width="100%">
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="card-body p-2">
                        <ul class="list-group">
                            <li class="list-group-item active text-center"><b>DATA MASYARAKAT</b></li>

                            {{-- Nama Lengkap --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">Nama : </div>
                                    <div class="col-sm-8">
                                        {{ Auth::guard('masyarakat')->user()->nama }}
                                    </div>
                                </div>
                            </li>

                            {{-- Nomor Induk Kependudukan --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">NIK : </div>
                                    <div class="col-sm-8">
                                        {{ Auth::guard('masyarakat')->user()->nik }}
                                    </div>
                                </div>
                            </li>

                            {{-- Nomor Telepon --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">Nomor Telepon : </div>
                                    <div class="col-sm-8">
                                        {{ Auth::guard('masyarakat')->user()->telp }}
                                    </div>
                                </div>
                            </li>

                            {{-- Email --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">E-Mail : </div>
                                    <div class="col-sm-8">
                                        {{ Auth::guard('masyarakat')->user()->email }}
                                    </div>
                                </div>
                            </li>

                            {{-- Tempat / Tanggal Lahir --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">Tempat / Tanggal Lahir : </div>
                                    <div class="col-sm-8">
                                        @if (!Auth::guard('masyarakat')->user()->tmpt_lahir)
                                            -
                                        @elseif (Auth::guard('masyarakat')->user()->tmpt_lahir)
                                            {{ Auth::guard('masyarakat')->user()->tmpt_lahir }}
                                        @endif
                                        /
                                        @if (!Auth::guard('masyarakat')->user()->tgl_lahir)
                                            -
                                        @elseif (Auth::guard('masyarakat')->user()->tgl_lahir)
                                            {{ Auth::guard('masyarakat')->user()->tgl_lahir }}
                                        @endif
                                    </div>
                                </div>
                            </li>

                            {{-- Alamat --}}
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">Alamat : </div>
                                    <div class="col-sm-8">
                                        @if (!Auth::guard('masyarakat')->user()->alamat)
                                            -
                                        @elseif (Auth::guard('masyarakat')->user()->alamat)
                                            {{ Auth::guard('masyarakat')->user()->alamat }}
                                        @endif
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 py-2">
                    <div class="d-grid gap-2">
                        <a href="/konfigurasi/masyarakat/{{ Auth::guard('masyarakat')->user()->id }}/edit" class="btn btn-primary">
                            Ubah Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Petugas --}}
    @elseif (Auth::guard('petugas')->check())
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 text-center mt-3">
                    <img src="{{ asset('img/400x400.png') }}" alt="" width="95%" class="p-2">
                </div>
                <div class="col-lg-8">
                    <div class="card-body p-2">
                        <ul class="list-group">
                            <li class="list-group-item active text-center"><b>PETUGAS</b></li>
                            <li class="list-group-item">Nama Lengkap</li>
                            <li class="list-group-item">Nomor Induk Kependudukan</li>
                            <li class="list-group-item">Instansi Bekerja</li>
                            <li class="list-group-item">No Handphone</li>
                            <li class="list-group-item">Alamat Email</li>
                            <li class="list-group-item">Username</li>
                            <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione
                                blanditiis sint, praesentium accusantium adipisci, expedita delectus et aspernatur possimus
                                voluptatum corporis, ipsa eos saepe dolore obcaecati recusandae voluptatibus excepturi
                                minima?</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 py-2">
                    <div class="d-grid gap-2">
                        <a href="/ubah" class="btn btn-primary">
                            Ubah Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
