<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $table = "produk";

    protected $fillable = [
        'kategori_id', 'nama', 'keterangan', 'harga', 'stok', 'berat', 'status', 'best_seller'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }

    public function gambar_produk()
    {
        return $this->belongsTo(GambarProduk::class, 'id', 'produk_id');
    }

    public function produk_transaksi()
    {
        return $this->belongsTo(ProdukTransaksi::class, 'id', 'produk_id');
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id', 'produk_id');
    }

    public function gambar()
    {
        return $this->hasOne(GambarProduk::class, 'produk_id', 'id');
    }
}
