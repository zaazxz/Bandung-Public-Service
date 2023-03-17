<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Cetak data</title>
</head>

<body>



    <div class="container">
        <h3 class="my-3 fw-bold">Cetak Data Pengaduan dari : {{ $dari }} sampai : {{ $sampai }}</h3>
        <table class="table table-bordered table-stripped" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal Dibuat</th>
                <th>Lampiran</th>
                <th>Status</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->masyarakat->nama }}</td>
                    <td>{{ $item->created_at }}</td>
                    @if ($item->gambar)
                        <td>
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="" srcset="" style="max-width: 200px;">
                        </td>
                    @else
                        <td>Tidak Ada Gambar</td>
                    @endif
                    @if ($item->status == "Menunggu")
                        <td class="text-primary">{{ $item->status }}</td>
                    @elseif ($item->status == "Diproses")
                        <td class="text-warning">{{ $item->status }}</td>
                    @elseif ($item->status == "Selesai")
                        <td class="text-success">{{ $item->status }}</td>
                    @else
                        <td class="text-danger">{{ $item->status }}</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>


    <script type="text/javascript">
        window.print();
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
