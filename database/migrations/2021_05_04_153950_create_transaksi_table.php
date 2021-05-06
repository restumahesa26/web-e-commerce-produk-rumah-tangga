<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('kode_transaksi');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('alamat_lengkap');
            $table->string('kode_pos');
            $table->string('status_bayar');
            $table->integer('total');
            $table->integer('rekening_pembayaran');
            $table->integer('rekening_user');
            $table->string('bukti_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
