<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    public $table = "keranjang";

    protected $fillable = [
        'user_id', 'produk_id', 'quantitas'
    ];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }
}
