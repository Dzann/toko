<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function home()
    {
        $produks = produk::all();
        $user = User::all();
        foreach ($produks as $produk) {
            $produk->name = Str::limit($produk->name, 14, '...');
            $produk->deskripsi = Str::limit($produk->deskripsi, 50, '...');
        }
        return view('welcome', compact('produks', 'user'));
    }


    public function detailProduk(Request $request, produk $produk)
    {
        return view('detail', compact('produk'));
    }

    public function postKeranjang(Request $request, produk $produk)
    {
        $request->validate([
            'banyak' => 'required',
        ]);
        if (Auth::check()) {
            detailtransaksi::create([
                'qty' => $request->banyak,
                'user_id' => Auth::id(),
                'produk_id' => $produk->id,
                'status' => 'keranjang',
                'totalharga' => $produk->harga * $request->banyak,
            ]);
    
            return redirect()->route('pelanggan.keranjang')->with('status', 'dimasukkan kedalam keranjang');
        } else {
            // Tidak ada user yang terotentikasi, tangani di sini
            // Misalnya, arahkan pengguna untuk login terlebih dahulu
            return redirect()->route('login')->with('status', 'Anda harus login terlebih dahulu.');
        }
    }

    public function keranjang(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('status', 'keranjang')->with('produk')->get();

        return view('keranjang', compact('detailtransaksi'));
    }

    public function bayar(Request $request, detailtransaksi $detailtransaksi)
    {
        $produk = $detailtransaksi->produk;
        return view('bayar', compact('produk','detailtransaksi'));
    }

    public function prosesbayar(Request $request, detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi' => 'required|file',
        ]);

        $transaksi = transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode' => 'INV' . Str::random(8)
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'checkout',
            'bukti_transaksi' => $request->bukti_transaksi->store('img')
        ]);
        

        return redirect()->route('pelanggan.summary')->with('status', 'Berhasil checkout atau upload bukti');
    }

    public function summary(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status', 'checkout')->get();

        return view('summary', compact('detailtransaksi'));
    }

    // public function summary(Request $request)
    // {
    //     $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status', 'checkout')->get();

    //     foreach ($detailtransaksi as $item) {
    //         if ($item->transaksi) {
    //             // Jika transaksi tersedia, maka kode bisa diakses
    //             dd($item->transaksi->kode);
    //         } else {
    //             // Jika transaksi null, munculkan pesan atau lakukan penanganan sesuai kebutuhan
    //             dd('Transaksi untuk detailtransaksi ' . $item->id . ' tidak tersedia.');
    //         }
    //     }

    //     return view('summary', compact('detailtransaksi'));
    // }
}
