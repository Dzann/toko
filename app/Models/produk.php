<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'kategori_id',
        'name',
        'harga',
        'foto',
        'deskripsi'
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    function detailtransaksi() {
        return $this->belongsTo(Detailtransaksi::class, 'transaksi_id');
    }
}
