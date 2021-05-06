<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data_produk = Produk::count();
        $data_kategori = Kategori::count();
        $data_pesanan = Transaksi::where('status_bayar', 'Belum Divalidasi')->count();
        $data_user = User::count();

        return view('pages.admin.dashboard', [
            'data_produk' => $data_produk, 'data_kategori' => $data_kategori, 'data_pesanan' => $data_pesanan, 'data_user' => $data_user
        ]);
    }

    public function show_admin()
    {
        $items = User::all();
        return view('pages.admin.data_admin.index', [
            'items' => $items
        ]);
    }

    public function set_admin($id)
    {
        $item = User::findOrFail($id);
        $item->roles = 'ADMIN';
        $item->save();

        return redirect()->route('show-admin');
    }

    public function set_user($id)
    {
        $item = User::findOrFail($id);
        $item->roles = 'USER';
        $item->save();

        return redirect()->route('show-admin');
    }

    public function delete_admin($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('show-admin');
    }
}
