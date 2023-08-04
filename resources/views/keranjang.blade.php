<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    @include('template.nav')

    <div class="container mt-5">
        <h5>Keranjang</h5>
        <hr>
        @if (Session::has('status'))
            <div class=""><span style="color: rgb(251, 0, 0)">{{ Session::Get('status') }}</span></div>
        @endif
        <div class="card mt-3">
            <div class="row">
                    @foreach ($detailtransaksi as $item)
                    <div class="col-3 p-4">
                        <img src="{{ asset($item->produk->foto) }}" alt="" class="img-thumbnail">
                    </div>

                    <div class="col-7">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->produk->name }}</h3>
                            <hr>
                            <p class="card-text">Harga: Rp.{{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                            <input type="number" name="banyak" id="" class="form-control" value="{{ $item->qty }}" placeholder="banyak" required>
                            <hr>
                            <p class="card-text">Total Harga: Rp.{{ number_format($item->totalharga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="col-2 p-5">
                        <br>
                        <br>
                        <br>
                        <a href="{{ route('pelanggan.bayar', $item->id) }}" class="btn btn-info" style="width: 100%">Bayar</a>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>