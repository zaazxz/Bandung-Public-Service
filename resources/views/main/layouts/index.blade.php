<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/jadi-biru.png') }}" type="image/x-icon">

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}>

    <title>BPSE | {{ $title }}</title>
</head>

<body style="background-color:
        #dedede">

    {{-- Header : Start --}}
    @include('main.layouts.header.index')
    {{-- Header : End --}}

    {{-- Content : Start --}}
    @yield('content')
    {{-- Content : End --}}

    {{-- Footer : Start --}}
    @include('main.layouts.footer.index')
    {{-- Footer : End --}}

    {{-- Alert Sweetalert2 --}}
    @include('sweetalert::alert')
    {{-- End : Alert --}}

    {{-- JavaScript --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
    <script src="{{ asset('assets/js/pages/sweetalert2.js') }}"></script>>

    </body>

</html>
