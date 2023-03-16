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
                                <th>Nomor Induk Kependudukan</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($masyarakats as $masyarakat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $masyarakat->nama }}</td>
                                    <td>{{ $masyarakat->nik }}</td>
                                    <td>{{ $masyarakat->email }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6 my-1">
                                                <div class="d-grid gap-2">


                                                    {{-- Modal Button --}}
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $masyarakat->id }}">
                                                        Detail
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 my-1">

                                                <form action="/dashboard/masyarakat/{{ $masyarakat->id }}" method="post"
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

                                <div class="modal fade" id="exampleModal{{ $masyarakat->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ $masyarakat->nama }}
                                                </h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3 mx-auto">
                                                        @if (!$masyarakat->gambar)
                                                            <img src="{{ asset('img/1200x720.png') }}" alt=""
                                                                srcset="" width="100%" class="my-2">
                                                        @else
                                                            <img src="{{ asset('storage/' . $masyarakat->gambar) }}"
                                                                alt="" srcset="" width="100%" class="my-2">
                                                        @endif
                                                    </div>

                                                    <div class="col-9 pt-3">

                                                        {{-- Nama --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Nama : </div>
                                                            <div class="col-sm-8">
                                                                {{ $masyarakat->nama }}
                                                            </div>
                                                        </div>

                                                        {{-- Nik --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">NIK : </div>
                                                            <div class="col-sm-8">
                                                                {{ $masyarakat->nik }}
                                                            </div>
                                                        </div>

                                                        {{-- No Telepon --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Nomor Telepon : </div>
                                                            <div class="col-sm-8">
                                                                {{ $masyarakat->telp }}
                                                            </div>
                                                        </div>

                                                        {{-- Email --}}
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-sm-4">E-Mail : </div>
                                                                <div class="col-sm-8">
                                                                    {{ $masyarakat->email }}
                                                                </div>
                                                            </div>
                                                        </li>

                                                        {{-- Tempat Tanggal Lahir --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Tempat / Tanggal Lahir : </div>
                                                            <div class="col-sm-8">
                                                                @if (!$masyarakat->tmpt_lahir)
                                                                    -
                                                                @elseif ($masyarakat->tmpt_lahir)
                                                                    {{ $masyarakat->tmpt_lahir }}
                                                                @endif
                                                                /
                                                                @if (!$masyarakat->tgl_lahir)
                                                                    -
                                                                @elseif ($masyarakat->tgl_lahir)
                                                                    {{ $masyarakat->tgl_lahir }}
                                                                @endif
                                                            </div>
                                                        </div>

                                                        {{-- Alamat --}}
                                                        <div class="row">
                                                            <div class="col-sm-4">Alamat : </div>
                                                            <div class="col-sm-8">
                                                                @if (!$masyarakat->alamat)
                                                                    -
                                                                @elseif ($masyarakat->alamat)
                                                                    {{ $masyarakat->alamat }}
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
    </div>
@endsection
