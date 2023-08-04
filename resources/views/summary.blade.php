<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body>
    @include('template.nav')

    <div class="container mt-5 mb-5">
        <h3>Summary</h3>

        <hr>
        @if (Session::has('status'))
            <div class=""><span style="color: rgb(251, 0, 0)">{{ Session::Get('status') }}</span></div>
        @endif
        @foreach ($detailtransaksi as $item)
            <div class="card mt-3">
                <div class="row">
                    <div class="col-2 pd-4">
                        <img src="{{ asset($item->produk->foto) }}" alt="{{ $item->produk->name }}"
                            class="img-thumbnail">
                    </div>

                    <div class="col-10">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->produk->name }}</h3>
                            <h5 class="card-title">Invoice : {{ $item->transaksi->kode }}</h5>
                            {{-- @if ($item->transaksi)
                                <h5 class="card-title">Invoice : {{ $item->transaksi->kode }}</h5>
                            @else
                                <h5 class="card-title">Invoice Not Available</h5>
                            @endif --}}
                            <hr>
                            <p class="card-text">Harga : Rp.{{ number_format($item->produk->harga, '0', ',', '.')}}</p>
                            <p class="card-text">Banyak : {{ $item->qty }}</p>
                            <hr>
                            <p class="card-text">Total Harga : Rp.{{ number_format($item->totalharga, '0', ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</body>

</html>
