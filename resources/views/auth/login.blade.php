<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPSE | Masuk</title>

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/jadi-biru.png') }}" type="image/x-icon">

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div class="row">
                    <div class="col-lg-12 text-center mt-5">
                        <img src="{{ asset('img/jadi-hitam.png') }}" alt="" width="30%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt-2">
                        <h3 class="text-center teks-header" style="color: black">MASUK</h3>
                        <p class="teks-header-2">Silahkan Masukkan Username & Password</p>
                        <hr style="width: 80%;" class="mx-auto">
                        <form action="/login" method="post" enctype="multipart/form-data" class="px-5">
                            @csrf
                            <div class="form-floating mb-3">
                                <input
                                type="text"
                                class="form-control"
                                id="username"
                                placeholder="Masukkan Username"
                                name="username">
                                <label for="username">Masukkan Username</label>
                            </div>
                            <div class="form-floating">
                                <input
                                type="password"
                                class="form-control"
                                id="password"
                                placeholder="Masukkan Password"
                                name="password">
                                <label for="password">Masukkan Password</label>
                            </div>
                            <hr style="width: 95%;" class="mx-auto">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">
                                    Masuk
                                </button>
                            </div>
                            <hr style="width: 95%;" class="mx-auto">
                        </form>
                        <small>Tidak memiliki akun? <a href="/daftar">Daftar</a></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../img/3.jpg'); background-size: cover;">

                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>
