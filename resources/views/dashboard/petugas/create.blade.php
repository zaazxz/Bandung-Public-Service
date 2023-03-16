@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <form class="form" action="/dashboard/petugas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama lengkap</label>
                                <input
                                type="text"
                                id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan Nama Lengkap"
                                name="nama"
                                required
                                >
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input
                                type="text"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan E-Mail"
                                name="email"
                                required
                                >
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input
                                type="text"
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Masukkan Username"
                                name="username"
                                required
                                >
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password"
                                name="password"
                                required
                                >
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
