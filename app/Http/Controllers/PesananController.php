<?php

namespace App\Http\Controllers;

use App\ProdukTransaksi;
use App\Transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function show_pesanan_belum_validasi()
    {
        $items = Transaksi::where('status_bayar', 'Belum Divalidasi')->get();
        return view('pages.admin.pesanan_belum_divalidasi.index', [
            'items' => $items
        ]);
    }

    public function tambah_total_bayar($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pages.admin.pesanan_belum_divalidasi.edit', [
            'item' => $item
        ]);
    }

    public function simpan_total_bayar(Request $request, $id)
    {
        $total_bayar = $request->total_bayar;
        $item = Transaksi::findOrFail($id);
        $item->total = $total_bayar;
        $item->status_bayar = "Belum Bayar";
        $item->save();

        return redirect()->route('show-pesanan-belum-validasi');
    }

    public function show_pesanan_belum_bayar()
    {
        $items = Transaksi::where('status_bayar', 'Belum Bayar')->get();
        return view('pages.admin.pesanan_belum_bayar.index', [
            'items' => $items
        ]);
    }

    public function show_pesanan_diproses()
    {
        $items = Transaksi::where('status_bayar', 'Diproses')->get();
        return view('pages.admin.pesanan_diproses.index', [
            'items' => $items
        ]);
    }

    public function show_pesanan($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pages.admin.pesanan_diproses.edit', [
            'item' => $item
        ]);
    }

    public function show_bukti_bayar($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pages.admin.pesanan_diproses.accept', [
            'item' => $item
        ]);
    }

    public function proses_bukti_bayar($id)
    {
        $item = Transaksi::findOrFail($id);
        $item->status_bayar = "Dikirim";
        $item->save();

        return redirect()->route('show-pesanan-diproses');
    }

    public function show_pesanan_selesai()
    {
        $items = Transaksi::where('status_bayar', 'Dikirim')->orWhere('status_bayar', 'Selesai')->get();
        return view('pages.admin.pesanan_selesai.index', [
            'items' => $items
        ]);
    }

    public function hapus_pesanan($id)
    {
        $item = Transaksi::findOrFail($id);
        $item2 = ProdukTransaksi::where('transaksi_id', $id)->get();
        foreach ($item2 as $key => $value) {
            $value->delete();
        }
        $item->delete();

        return redirect()->back();
    }
}
