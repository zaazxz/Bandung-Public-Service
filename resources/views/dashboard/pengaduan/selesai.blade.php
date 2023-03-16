@extends('dashboard.layouts.index')

@section('content')
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduans as $pengaduan)
                        @if ($pengaduan->status == "Selesai")
                        <tr>
                            <td>{{ $loop->iteration }}
                            <td>{{ $pengaduan->judul }}</td>
                            <td class="text-success">{{ $pengaduan->status }}</td>
                            @if ($pengaduan->identitas == 0)
                                <td>Anonymous</td>
                            @else
                                <td>{{$pengaduan->masyarakat->nama}}</td> 
                            @endif
                            <td>
                            	<div class="row">
                            		<div class="col-lg-12">
                            			<div class="d-grid gap-2">
                            				<a class="btn btn-primary" href="/dashboard/pengaduan/{{$pengaduan->id}}">Detail</a>
                            			</div>
                            		</div>
                            	</div>
                            </td>
                        </tr>
                        @elseif ($pengaduan->status == "Ditolak")
                        <tr>
                            <td>{{ $loop->iteration }}
                            <td>{{ $pengaduan->judul }}</td>
                            <td class="text-danger">{{ $pengaduan->status }}</td>
                            @if ($pengaduan->identitas == 0)
                                <td>Anonymous</td>
                            @else
                                <td>{{$pengaduan->masyarakat->nama}}</td> 
                            @endif
                            <td>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-primary" href="/dashboard/pengaduan/{{$pengaduan->id}}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection