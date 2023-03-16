@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">List Masyarakat</div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($petugass as $petugas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $petugas->nama }}</td>
                                    <td>{{ $petugas->email }}</td>
                                    <td>{{ $petugas->telp }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6 my-1">
                                                <div class="d-grid gap-2">


                                                    {{-- Modal Button --}}
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $petugas->id }}">
                                                        Detail
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 my-1">

                                                <form action="/dashboard/petugas/{{ $petugas->id }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    {{-- Delete Button --}}
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="confirm('data ini akan dihapus, anda yakin?')">Hapus</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="exampleModal{{ $petugas->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ $petugas->nama }}
                                                </h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        @if (!$petugas->gambar)
                                                            <img src="{{ asset('img/1200x720.png') }}" alt=""
                                                                srcset="" width="100%" class="my-2">
                                                        @else
                                                            <img src="{{ asset('storage/' . $petugas->gambar) }}"
                                                                alt="" srcset="" width="100%" class="my-2">
                                                        @endif
                                                    </div>

                                                    <div class="col-9 pt-3">

                                                        {{-- Nama --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Nama : </div>
                                                            <div class="col-sm-8">
                                                                {{ $petugas->nama }}
                                                            </div>
                                                        </div>

                                                        {{-- Email --}}
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-sm-4">E-Mail : </div>
                                                                <div class="col-sm-8">
                                                                    {{ $petugas->email }}
                                                                </div>
                                                            </div>
                                                        </li>

                                                        {{-- No Telepon --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Nomor Telepon : </div>
                                                            <div class="col-sm-8">
                                                                @if (!$petugas->telp)
                                                                    -
                                                                @elseif ($petugas->telp)
                                                                    {{ $petugas->telp }}
                                                                @endif
                                                            </div>
                                                        </div>

                                                        {{-- Alamat --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Alamat : </div>
                                                            <div class="col-sm-8">
                                                                @if (!$petugas->alamat)
                                                                    -
                                                                @elseif ($petugas->alamat)
                                                                    {{ $petugas->alamat }}
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-5">
            <div class="d-grid gap-2">
                <a href="/dashboard/petugas/create" class="btn btn-primary">Tambah Akun Petugas</a>
            </div>
        </div>
    </div>
@endsection
