<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    @include('template.nav')

    <div class="container mt-5">
        <a href="{{ route('admin.tampilTambahProduk') }}" class="btn btn-primary">Tambah Produk</a>
        @if (Session::has('status'))
            <div class=""><span style="color: rgb(0, 251, 126)">{{ Session::Get('status') }}</span></div>
        @endif
        <table class="table table-responsive-sm mt-3">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                <tr>
                    <td>
                    <img src="{{ asset($item->foto) }}" alt="{{ $item->name }}" width="100" height="100">
                    </td> 
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->harga, '0', ',', '.') }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</body>
</html>