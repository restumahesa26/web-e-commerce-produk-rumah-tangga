<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    public $table = "gambar_produk";

    protected $fillable = [
        'img_url'
    ];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }

    public function produks()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
