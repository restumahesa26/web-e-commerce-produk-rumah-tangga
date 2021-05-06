<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukTransaksi extends Model
{
    public $table = "produk_transaksi";

    protected $fillable = [
        'transaksi_id', 'produk_id', 'quantitas'
    ];

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_id', 'id');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }
}
