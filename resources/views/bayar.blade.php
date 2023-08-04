<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bayar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body>
    @include('template.nav')

    <form action="{{ route('pelanggan.prosesbayar', $detailtransaksi->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <h5>Upload Bukti Pembayaran</h5>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset($produk->foto) }}" alt="" class="card-img-top">
                    </div>
                </div>

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $produk->name }}</h2>
                            <hr>
                            <p class="card-text">Harga Satuan : Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <p class="card-text">Total Harga : Rp.{{ number_format($detailtransaksi->totalharga, 0, ',', '.') }}</p>
                            <p class="card-text">Banyak : {{$detailtransaksi->qty}}</p>
                            <hr>
                            <div class="mb-2">
                                <label for="" class="form-control"><b>Bukti Pembayaran</b></label>
                                <input type="file" name="bukti_transaksi" accept="img/*" required>
                            </div>
                            <hr>
                            <h5>Keterangan : </h5>
                            <p>Silahkan lakukan transfer ke bank berikut dan tunggu konfirmasi dari kami</p>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
