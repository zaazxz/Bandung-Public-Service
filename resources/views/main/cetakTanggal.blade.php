<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak data</title>
</head>
<body>



	<center>
		<h3>Cetak Data Pertanggal</h3>
		<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Status</th>
		</tr>
		@foreach ($data as $item)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$item->judul}}</td>
			<td>{{$item->masyarakat->nama}}</td>
			<td>{{$item->status}}</td>
		</tr>
		@endforeach
	</table>
	</center>


	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
