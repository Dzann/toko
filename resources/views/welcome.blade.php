<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Dzann - Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    @include('template.nav')

    <div class="container mt-3">
        @if (Session::has('status'))
            <div class=""><span style="color: rgb(0, 251, 126)">{{ Session::Get('status') }}</span></div>
        @endif
        <div class="row">

            @foreach ($produks as $item)
                <div class="col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <img src="{{ asset($item->foto) }}" alt="{{ $item->name }}" width="305" height="280" class="card-image-top">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->name }}</h2>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <b class="card-text">Harga: Rp.{{ number_format($item->harga, 0, ',', '.') }}</b>
                            <br>
                            <a href="{{ route('detailProduk', $item->id) }}" style="width: 100%"
                                class="btn btn-primary mt-3">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
