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
                            <td class="text-warning">{{ $pengaduan->status }}</td>
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
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Selesaikan</h1>
                            </div>
                            <form method="post" action="/laporan/{{ $pengaduan->id }}" enctype="multipart/form-data">
                            	@csrf
                            	@method('put')
                                <div class="modal-body">

                                	<!-- Ubah Status -->
                                	<div class="col-lg-12">
                                        <div class="form-group text-white">
                                            @if(Auth::guard('user')->check())
                                    <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
                                    @elseif (Auth::guard('petugas')->check())
                                    <input type="hidden" name="petugas_id" value="{{Auth::guard('petugas')->user()->id}}">
                                    @endif
                                    <input type="hidden" name="status" value="Selesai">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            {{-- Pratinjau Gambar --}}
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white" for="contact-info-vertical">Pratinjau Gambar</label>
                                            <div class="container border mt-2 py-3 d-flex justify-content-center">
                                                <img id="imgPreview" src="{{asset('img/300x300.png')}}" alt="your image"
                                                    style="max-width: 200px;" />
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Input Gambar --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-white" for="gambar_tanggapan">gambar_tanggapan</label>
                                            <input class="form-control @error('gambar_tanggapan') is-invalid @enderror"
                                                type="file" id="gambar" name="gambar_tanggapan" onchange="previewImage()"
                                                value="{{ old('gambar_tanggapan') }}">
                                        </div>
                                    </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{-- Textarea Tanggapan Laporan --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-white" for="tanggapan">Tanggapi Laporan</label>
                                            <textarea class="form-control" id="tanggapan" style="height: 320px;" name="tanggapan" value="{{ old('tanggapan') }}" required></textarea>
                                        </div>
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