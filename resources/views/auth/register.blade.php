<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPSE | Daftar</title>

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/jadi-biru.png') }}" type="image/x-icon">

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right"
                    style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../img/2.jpg'); background-size: cover;">

                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('img/jadi-hitam.png') }}" alt="" width="30%" class="mt-5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="teks-header text-center " style="color: black">DAFTAR</h3>
                        <hr style="width: 90%;" class="mx-auto">
                        <form class="form px-3" method="post" enctype="multipart/form-data" action="/register">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input
                                        type="text"
                                        id="nama"
                                        placeholder="Nama Lengkap"
                                        name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}"
                                        required
                                        >
                                    </div>
                                    @error('nama')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        placeholder="Alamat Email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        required>
                                    </div>
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nik">Nomor Induk Kependudukan</label>
                                        <input
                                        type="number"
                                        id="nik"
                                        placeholder="Nomor Induk Kependudukan"
                                        name="nik"
                                        class="form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}"
                                        required>
                                    </div>
                                    @error('nik')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="telp">No Telepon</label>
                                        <input
                                        type="number"
                                        id="telp"
                                        placeholder="No Telepon"
                                        name="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ old('telp') }}"
                                        required>
                                    </div>
                                    @error('telp')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input
                                        type="text"
                                        id="username"
                                        placeholder="Username"
                                        name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}"
                                        required>
                                    </div>
                                    @error('username')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}"
                                        required>
                                    </div>
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <hr style="width: 95%;" class="mx-auto">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </form>
                        <hr style="width: 95%;" class="mx-auto">
                        <div class="text-center mb-2">
                            <small>Sudah memiliki akun? <a href="/masuk">Masuk</a></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- JavaScript --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>

</body>

</html>
