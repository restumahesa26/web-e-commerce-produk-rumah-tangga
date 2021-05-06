<?php

namespace App\Http\Controllers;

use App\GambarProduk;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class GambarProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GambarProduk::orderBy('produk_id', 'asc')->get();
        return view('pages.admin.gambar-produk.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();

        return view('pages.admin.gambar-produk.create', [
            'produk' => $produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->produk_id;

        $check = GambarProduk::where('produk_id', $id)->first();

        if ($check == null) {
            $file = $request->file('img_url');
            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/images/gambar-produk', $file, $imageNames);
            $thumbnailpath = public_path('storage/images/gambar-produk/' . $imageNames);
            $img = Image::make($thumbnailpath)->resize(800, 800)->save($thumbnailpath);

            GambarProduk::insert([
                'produk_id' => $id,
                'img_url' => $imageNames
            ]);

            return redirect()->route('gambar-produk.index')->with('success-create', 'Sukses');
        } else {
            return redirect()->back()->with('error-create', 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GambarProduk::findOrFail($id);
        $item->delete();

        return redirect()->route('gambar-produk.index')->with('success-delete', 'Sukses');;
    }
}
