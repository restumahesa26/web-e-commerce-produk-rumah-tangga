<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/add-to-cart/{id}', 'HomeController@add_cart')->name('add-cart');

    Route::post('/add-to-cart-value', 'HomeController@add_cart2')->name('add-cart-2');

    Route::get('/show-cart', 'HomeController@show_cart')->name('show-cart');

    Route::post('/show-cart/update-cart', 'HomeController@update_cart')->name('update-cart');

    Route::post('/show-cart/checkout', 'HomeController@checkout')->name('checkout');

    Route::get('/show-order', 'HomeController@show_order')->name('show-order');

    Route::get('/show-order/pay/{id}', 'HomeController@show_pay')->name('show-pay');

    Route::post('/show-order/pay/proses-pembayaran/{id}', 'HomeController@proses_pay')->name('proses-pay');

    Route::get('/show-order/pesanan-sampai-tujuan/{id}', 'HomeController@pesanan_sampai_tujuan')->name('pesanan-sampai-tujuan');

    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');

    Route::patch('/profile/update', 'ProfileController@update')->name('profile.update');

    Route::get('/product', 'HomeController@show_product')->name('product');

    Route::get('/product/search', 'HomeController@search_product')->name('search-product');

    Route::get('/show-cart/delete-cart/{id}', 'HomeController@delete_cart')->name('delete-cart');

    Route::get('/product/kategori/{id}', 'HomeController@show_category_product')->name('product-category');

    Route::get('/detail-product/{id}', 'HomeController@detail_product')->name('detail-product');

    Route::get('/about', 'HomeController@about')->name('about');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/', 'DashboardController@dashboard')->name('dashboard');

        Route::resource('kategori', 'KategoriController');

        Route::resource('produk', 'ProdukController');

        Route::resource('gambar-produk', 'GambarProdukController');

        Route::get('/pesanan-belum-divalidasi', 'PesananController@show_pesanan_belum_validasi')->name('show-pesanan-belum-validasi');

        Route::get('/pesanan-belum-divalidasi/edit/{id}', 'PesananController@tambah_total_bayar')->name('tambah-total-bayar');

        Route::post('/pesanan-belum-divalidasi/edit/simpan/{id}', 'PesananController@simpan_total_bayar')->name('simpan-total-bayar');

        Route::get('/pesanan-belum-bayar', 'PesananController@show_pesanan_belum_bayar')->name('show-pesanan-belum-bayar');

        Route::get('/pesanan-diproses', 'PesananController@show_pesanan_diproses')->name('show-pesanan-diproses');

        Route::get('/pesanan/show/{id}', 'PesananController@show_pesanan')->name('show-pesanan');

        Route::get('/show-bukti-bayar/{id}', 'PesananController@show_bukti_bayar')->name('show-bukti-bayar');

        Route::post('/show-bukti-bayar/setuju-pembayaran/{id}', 'PesananController@proses_bukti_bayar')->name('proses-bukti-bayar');

        Route::get('/pesanan-selesai', 'PesananController@show_pesanan_selesai')->name('show-pesanan-selesai');

        Route::delete('/hapus-pesanan/{id}', 'PesananController@hapus_pesanan')->name('hapus-pesanan');

        Route::get('/data-admin', 'DashboardController@show_admin')->name('show-admin');

        Route::get('/data-admin/set-admin/{id}', 'DashboardController@set_admin')->name('set-admin');

        Route::get('/data-admin/set-user/{id}', 'DashboardController@set_user')->name('set-user');

        Route::delete('/data-admin/delete-data-admin/{id}', 'DashboardController@delete_admin')->name('delete-admin');
    });

Auth::routes();
