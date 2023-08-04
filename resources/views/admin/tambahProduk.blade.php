<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Tambah Produk</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link font awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    </style>
</head>

<body>
    @include('template.nav')

    <div class="container mt-4">
        <!-- Form untuk tambah data -->
        <form action="{{ route('admin.tambahProduk') }}" id="tambah-data-form" method="post" enctype="multipart/form-data">
            <!-- Card untuk form -->
            @csrf
            <div class="card">
                <h1 class="text-center mt-3">Tambah Data</h1>
                <!-- Gambar di atas card -->
                {{-- <img src="logo.png" class="card-img-top" alt="Logo"> --}}
                <!-- Bagian dalam card -->
                <div class="card-body">
                    <!-- Form group untuk nama produk -->
                    <div class="form-group">
                        <label for="nama-produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama-produk" name="name" placeholder="Masukkan nama produk" required>
                    </div>
                    <!-- Form group untuk harga -->
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk dalam rupiah" required>
                    </div>
                    <!-- Form group untuk foto -->
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.gif" required>
                    </div>
                    <!-- Form group untuk deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi produk secara singkat dan jelas" required></textarea>
                    </div>
                    <!-- Form group untuk kategori -->
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-controll" id="">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Button untuk submit form -->
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>        
        </form>
    </div>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    
    
</body>

</html>
