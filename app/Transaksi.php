<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $table = "transaksi";

    protected $fillable = [
        'user_id', 'kode_transaksi', 'provinsi', 'kota', 'kecamatan', 'alamat_lengkap', 'kode_pos', 'status_bayar', 'total', 'rekening_pembayaran',  'rekening_user', 'bukti_bayar'
    ];

    public function produk_transaksi()
    {
        return $this->hasMany(ProdukTransaksi::class, 'transaksi_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
