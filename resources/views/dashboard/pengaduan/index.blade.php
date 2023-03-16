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
                    
                        <tr>
                            <td>{{ $loop->iteration }}
                            <td>{{ $pengaduan->judul }}</td>
                            <td class="text-primary">{{ $pengaduan->status }}</td>
                            @if ($pengaduan->identitas == 0)
                                <td>Anonymous</td>
                            @else
                                <td>{{$pengaduan->masyarakat->nama}}</td> 
                            @endif
                            <td>
                            	<div class="row">
                            		<div class="col-lg-6">
                            			<div class="d-grid gap-2">
                            				<button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $pengaduan->id }}">
                                Ubah Status
                            </button>
                            			</div>
                            		</div>
                            		<div class="col-lg-6">
                            			<div class="d-grid gap-2">
                            				<a class="btn btn-primary" href="/dashboard/pengaduan/{{$pengaduan->id}}">Detail</a>
                            			</div>
                            		</div>
                            	</div>
                            </td>
                        </tr>
                    
                    {{-- Modal --}}
                <div class="modal fade" id="exampleModal{{ $pengaduan->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Laporan</h1>
                            </div>
                            <form method="post" action="/laporan/{{ $pengaduan->id }}" enctype="multipart/form-data">
                            	@csrf
                            	@method('put')
                                <div class="modal-body">

                                	<!-- Ubah Status -->
                                	<div class="col-lg-12">
                                        <div class="form-group text-white">
                                            <label class="text-white" for="first-name-column">Ubah Status Laporan</label>
                                            <div class="row mt-1 py-1">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="status" value="Diproses" checked>
                                                        <label class="form-check-label" for="status">
                                                            Diproses
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="status" value="Ditolak">
                                                        <label class="form-check-label" for="status">
                                                            Ditolak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="width: 100%">
                                    	<div class="col-6">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary"
                                                    >Ubah</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection