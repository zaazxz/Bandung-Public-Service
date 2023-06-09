@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon bg-primary mb-2">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Laporan Dibuat</h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $pengaduans->count() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon bg-warning mb-2">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Laporan Menunggu</h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $pengaduans->where('status', 'Menunggu')->count() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon bg-success mb-2">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Laporan Selesai</h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $pengaduans->where('status', 'Selesai')->count() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon bg-danger mb-2">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Laporan Ditolak</h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $pengaduans->where('status', 'Ditolak')->count() }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="card">
        <div class="card-header">Simple Datatable</div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Status</th>
                        <th>Penulis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}
                            <td>{{ $pengaduan->judul }}</td>
                            @if ($pengaduan->status == 'Menunggu')
                                <td class="text-primary">{{ $pengaduan->status }}</td> 
                            @elseif ($pengaduan->status == 'Diproses')
                                <td class="text-warning">{{ $pengaduan->status }}</td>
                            @elseif ($pengaduan->status == 'Selesai')
                                <td class="text-success">{{ $pengaduan->status }}</td>
                            @else
                                <td class="text-danger">{{ $pengaduan->status }}</td>
                            @endif
                            @if ($pengaduan->identitas == 0)
                                <td>Anonymous</td>
                            @else
                                <td>{{$pengaduan->masyarakat->nama}}</td> 
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                               <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Masyarakat</h6>
                            <h6 class="font-extrabold mb-0">{{ $masyarakats->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Petugas</h6>
                            <h6 class="font-extrabold mb-0">{{ $petugass->count() }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
