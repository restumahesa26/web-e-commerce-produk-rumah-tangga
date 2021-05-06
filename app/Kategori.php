<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $table = "kategori";

    protected $fillable = [
        'nama_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Produk::class, 'id', 'kategori_id');
    }
}
