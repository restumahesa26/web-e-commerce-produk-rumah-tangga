<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Keranjang;
use App\Produk;
use App\ProdukTransaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        } else {
            $cart = 0;
        }
        $items = Produk::where('best_seller', 1)->get();
        return view('pages.home', [
            'items' => $items, 'cart' => $cart
        ]);
    }

    public function add_cart($id)
    {
        $item = Produk::findOrFail($id);
        $idd = $item->id;

        $check = Keranjang::where('user_id', Auth::user()->id)->where('produk_id', $idd)->first();

        if ($check == null) {
            $keranjang = new Keranjang();
            $keranjang->user_id = Auth::user()->id;
            $keranjang->produk_id = $id;
            $keranjang->quantitas = 1;
            $keranjang->save();

            return redirect()->back();
        } else {
            $keranjang = Keranjang::where('user_id', Auth::user()->id)->where('produk_id', $idd)->first();
            $keranjang1 = $keranjang->quantitas;
            $keranjang->quantitas = $keranjang1 + 1;
            $keranjang->save();

            return redirect()->back();
        }
    }

    public function update_cart(Request $request)
    {
        $id = array();
        $quanti = array();

        $idKeranjang = $request->idKeranjang;
        $quantitas = $request->quantitas;

        if ($idKeranjang != null) {
            foreach ($idKeranjang as $value) {
                $id[] = $value;
            }
            foreach ($quantitas as $value2) {
                $quanti[] = $value2;
            }

            foreach ($id as $key => $idd) {
                $item = Keranjang::find($idd);
                $item->quantitas = $quanti[$key];
                $item->save();
            }

            return redirect()->route('show-cart');
        } else {
            return redirect()->back();
        }
    }

    public function show_cart()
    {
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.cart', [
            'keranjang' => $keranjang, 'cart' => $cart
        ]);
    }

    public function checkout(Request $request)
    {
        $id = array();
        $idKeranjang = $request->idKeranjang2;
        foreach ($idKeranjang as $value) {
            $id[] = $value;
        }

        $transaksi = new Transaksi();
        $transaksi->user_id = Auth::user()->id;
        $transaksi->kode_transaksi = "PS-12345";
        $transaksi->provinsi = $request->provinsi;
        $transaksi->kota = $request->kota;
        $transaksi->kecamatan = $request->kecamatan;
        $transaksi->alamat_lengkap = $request->alamat_lengkap;
        $transaksi->kode_pos = $request->kode_pos;
        $transaksi->status_bayar = "Belum Divalidasi";
        $transaksi->total = $request->total;
        $transaksi->rekening_pembayaran = "0";
        $transaksi->rekening_user = "0";
        $transaksi->bukti_bayar = "-";
        $transaksi->save();

        $transaksi_id = $transaksi->id;

        foreach ($id as $key => $idd) {
            $save = new ProdukTransaksi();

            $item = Keranjang::find($idd);
            $produk = $item->produk_id;
            $quantity = $item->quantitas;

            $save->transaksi_id = $transaksi_id;
            $save->produk_id = $produk;
            $save->quantitas = $quantity;
            $save->save();
        }

        foreach ($id as $key => $idd) {
            $item = Keranjang::find($idd);
            $item->delete();
        }

        return redirect()->route('home');
    }

    public function show_order()
    {
        $items1 = Transaksi::where('status_bayar', 'Belum Divalidasi')->get();
        $items2 = Transaksi::where('status_bayar', 'Belum Bayar')->get();
        $items3 = Transaksi::where('status_bayar', 'Diproses')->get();
        $items4 = Transaksi::where('status_bayar', 'Dikirim')->get();
        $items5 = Transaksi::where('status_bayar', 'Selesai')->get();
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.order', [
            'items1' => $items1, 'cart' => $cart, 'items2' => $items2, 'items3' => $items3, 'items4' => $items4, 'items5' => $items5
        ]);
    }

    public function show_pay($id)
    {
        $item = Transaksi::findOrFail($id);
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.pay', [
            'item' => $item, 'cart' => $cart
        ]);
    }

    public function proses_pay(Request $request, $id)
    {
        $rekening_pembayaran = $request->rekening_pembayaran;
        $rekening_user = $request->rekening_user;
        $file = $request->file('bukti_bayar');
        $extension = $file->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/images/bukti-bayar', $file, $imageNames);
        $thumbnailpath = public_path('storage/images/bukti-bayar/' . $imageNames);
        $img = Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);

        $item = Transaksi::findOrFail($id);
        $item->rekening_pembayaran = $rekening_pembayaran;
        $item->rekening_user = $rekening_user;
        $item->bukti_bayar = $imageNames;
        $item->status_bayar = "Diproses";
        $item->save();

        return redirect()->route('show-order');
    }

    public function pesanan_sampai_tujuan($id)
    {
        $item = Transaksi::findOrFail($id);
        $item->status_bayar = "Selesai";
        $item->save();

        return redirect()->route('show-order');
    }

    public function show_product()
    {
        $items = Produk::all();
        $categories = Kategori::all();
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.product', [
            'items' => $items, 'cart' => $cart, 'categories' => $categories
        ]);
    }

    public function show_category_product($id)
    {
        $items = Produk::where('kategori_id', $id)->get();
        $categories = Kategori::all();
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.product', [
            'items' => $items, 'cart' => $cart, 'categories' => $categories
        ]);
    }

    public function search_product(Request $request)
    {
        $query = strtolower($request->search);
        $items = Produk::where('nama', 'LIKE', "%{$query}%")->get();
        $categories = Kategori::all();
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.product', [
            'items' => $items, 'cart' => $cart, 'categories' => $categories
        ]);
    }

    public function delete_cart($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }

    public function detail_product($id)
    {
        $item = Produk::findOrFail($id);
        $kategori = $item->kategori_id;
        $item2 = Produk::where('kategori_id', $kategori)->get();
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.detail-product', [
            'item' => $item, 'cart' => $cart, 'item2' => $item2
        ]);
    }

    public function add_cart2(Request $request)
    {
        $numProduk = $request->num_product;
        $id = $request->id;

        $item = Produk::findOrFail($id);
        $idd = $item->id;

        $check = Keranjang::where('user_id', Auth::user()->id)->where('produk_id', $idd)->first();

        if ($check == null) {
            $keranjang = new Keranjang();
            $keranjang->user_id = Auth::user()->id;
            $keranjang->produk_id = $id;
            $keranjang->quantitas = $numProduk;
            $keranjang->save();

            return redirect()->back();
        } else {
            $keranjang = Keranjang::where('user_id', Auth::user()->id)->where('produk_id', $idd)->first();
            $keranjang1 = $keranjang->quantitas;
            $keranjang->quantitas = $keranjang1 + $numProduk;
            $keranjang->save();

            return redirect()->back();
        }
    }

    public function about()
    {
        $cart = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('pages.about', [
            'cart' => $cart
        ]);
    }
}
