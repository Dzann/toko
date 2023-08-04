<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['transaksi_id'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}
