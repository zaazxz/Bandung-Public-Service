<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ $title }}</title>

    {{-- Icon Shortcut --}}
    <link rel="shortcut icon" href="{{ asset('img/jadi-biru.png') }}" type="image/x-icon">

    {{-- Offline  Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">


</head>

<body>
    <div id="app">

        {{-- Sidebar --}}
        @include('dashboard.layouts.sidebar.index')

        <div id="main" class='layout-navbar'>

            {{-- Header --}}
            @include('dashboard.layouts.header.index')

                @if ($title == 'Halaman Utamaj')
                <div id="main-content" style="margin-top: -45px;">
                    <hr>
                @else
                <div id="main-content" style="margin-top: -35px;">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-6 order-md-1 order-last">
                                    <h3 class="mb-0">{{ $title }}</h3>
                                    <p class="text-subtitle text-muted mb-0">
                                        {{ $sub }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endif

                <section class="section">
                    {{-- Content --}}
                    @yield('content')
                </section>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Zaazxz</p>
                        </div>
                        <div class="float-end">
                            <p>
                                Crafted by <a href="https://ahmadsaugi.com">Zaazxz</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama">Tanggal Awal</label>
                            <input type="date" id="tglAwal" placeholder="Nama Lengkap" name="tglAwal"
                                class="form-control @error('nama') is-invalid @enderror" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama">Tanggal Akhir</label>
                            <input type="date" id="tglAkhir" placeholder="Nama Lengkap" name="tglAkhir"
                                class="form-control @error('nama') is-invalid @enderror" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <a href="" onclick="this.href='/cetakPertanggal/'+document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value " type="submit" class="btn btn-primary" target="_blank">Save changes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    {{-- Offline Javascript --}}
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.3.js') }}"></script>

</body>

</html>
