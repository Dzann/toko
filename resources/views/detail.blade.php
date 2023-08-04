<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Dzann - {{ $produk->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    @include('template.nav')

    <div class="container mt-5">
        <form action="{{ route('pelanggan.postkeranjang', $produk->id) }}" method="post">
            @csrf
            <h2 class="card-title">Detail : {{ $produk->name }}</h2>
            <div class="row mt-3">
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset($produk->foto) }}" alt="{{ $produk->name }}" class="card-img-top">
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $produk->name }}</h2>
                            <p class="card-text">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <input type="number" name="banyak" id="" class="form-control" placeholder="banyak" required>
                            <hr>
                            <h5>Deskripsi :</h5>
                            <p class="card-text">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kategori :</h5>
                            <b>{{ $produk->kategori->name }}</b>
                            <button class="btn btn-success mt-3 form-control" style="width: 100%">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
