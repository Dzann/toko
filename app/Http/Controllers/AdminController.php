<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function dashboard()
    {
        $produk = produk::paginate(10);
        foreach ($produk as $item) {
            $item->name = Str::limit($item->name, 20, '...');
            $item->deskripsi = Str::limit($item->deskripsi, 50, '...');
        }
        return view('admin.dashboard', compact('produk'));
    }

    public function tampilTambahProduk(kategori $kategori)
    {
        $kategori = kategori::all();
        return view('admin.tambahProduk', compact('kategori'));
    }

    public function tambahProduk(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
        ]);

        produk::Create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'harga' => $request->harga,
            'foto' => $request->foto->store('img'),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Berhasil tambah data');
    }
}
