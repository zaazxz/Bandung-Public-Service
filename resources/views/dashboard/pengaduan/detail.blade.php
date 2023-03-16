@extends('dashboard.layouts.index')

@section('content')
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
                    Ditulis Pada : {{ $laporan->created_at }}
                    <br>
                    Judul Laporan : {{ $laporan->judul }}
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

            <hr class="my-3">

            @if ($laporan->status == "Selesai")
                <div class="row">
                    <div class="col-lg-6 mb-3">
                @if ($laporan->gambar_tanggapan)
                    <img src="{{ asset('storage/' . $laporan->gambar_tanggapan) }}" alt="" srcset="" width="100%"
                        class="rounded">
                @else
                    <img src="{{ asset('img/1200x720.png') }}" alt="" width="100%" class="rounded">
                @endif
                    </div>
                <div class="col-lg-6">
                    @if ($laporan->petugas_id)
                    <p>Petugas : {{$laporan->petugas->nama}}</p>
                    @elseif ($laporan->user_id)
                    <p>Petugas : {{$laporan->user->nama}}</p>
                    @endif
                    <h4>Tanggapan : </h4>
                    <p>{{ $laporan->tanggapan }}</p>
                </div>
                </div>
            @else
                <h3 class="text-muted text-center mb-3">Laporan Belum Ditindak Lanjuti.</h3>
            @endif

        </div>
@endsection