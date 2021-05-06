@extends('layouts.home')

@section('title')
	<title>Order</title>
@endsection

@section('content')
    <!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ url('frontend/images/heading-pages-01.jpg') }});">
		<h2 class="l-text2 t-center">
			Order
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
            <h5>Produk Belum Divalidasi Total Harga</h5>
            @forelse ($items1 as $item1)                
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr> 
                            @foreach ($item1->produk_transaksi as $ite1)                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/images/gambar-produk/'. $ite1->produk->gambar->img_url) }}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{ $ite1->produk->nama }}</td>
                                <td class="column-3">${{ $ite1->produk->harga }}</td>
                                <td class="column-4 p-l-70">{{ $ite1->quantitas }}</td>
                                <td class="column-5">${{ $ite1->quantitas * $ite1->produk->harga }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <p style="color: red;">Belum Ditentukan Total Bayar</p>
                    </div>
                </div>
            @empty
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>                  
                            <tr class="table-row">
                                <td class="column-1" colspan="20">Tidak Ada Pesanan Yang Belum Divalidasi</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforelse

            <h5 style="margin-top: 20px;">Produk Belum Dibayar</h5>
            @forelse ($items2 as $item2)                
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr> 
                            @foreach ($item2->produk_transaksi as $ite2)                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/images/gambar-produk/'. $ite2->produk->gambar->img_url) }}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{ $ite2->produk->nama }}</td>
                                <td class="column-3">${{ $ite2->produk->harga }}</td>
                                <td class="column-4 p-l-70">{{ $ite2->quantitas }}</td>
                                <td class="column-5">${{ $ite2->quantitas * $ite2->produk->harga }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5">{{ $item2->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <a href="{{ route('show-pay', $item2->id) }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
                            Bayar
                        </a>
                    </div>
                </div>
            @empty
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>                  
                            <tr class="table-row">
                                <td class="column-1" colspan="20">Tidak Ada Pesanan Yang Belum Dibayar</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforelse

            <h5 style="margin-top: 20px;">Produk Diproses</h5>
            @forelse ($items3 as $item3)                
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr> 
                            @foreach ($item3->produk_transaksi as $ite3)                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/images/gambar-produk/'. $ite3->produk->gambar->img_url) }}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{ $ite3->produk->nama }}</td>
                                <td class="column-3">${{ $ite3->produk->harga }}</td>
                                <td class="column-4 p-l-70">{{ $ite3->quantitas }}</td>
                                <td class="column-5">${{ $ite3->quantitas * $ite3->produk->harga }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5">{{ $item3->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <p style="color: red;">Pesanan Sedang Diproses</p>
                    </div>
                </div>
            @empty
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>                  
                            <tr class="table-row">
                                <td class="column-1" colspan="20">Tidak Ada Pesanan Yang Sedang Diproses</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforelse

            <h5 style="margin-top: 20px;">Produk Dikirim</h5>
            @forelse ($items4 as $item4)                
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr> 
                            @foreach ($item4->produk_transaksi as $ite4)                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/images/gambar-produk/'. $ite4->produk->gambar->img_url) }}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{ $ite4->produk->nama }}</td>
                                <td class="column-3">${{ $ite4->produk->harga }}</td>
                                <td class="column-4 p-l-70">{{ $ite4->quantitas }}</td>
                                <td class="column-5">${{ $ite4->quantitas * $ite4->produk->harga }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5">{{ $item4->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <a href="{{ route('pesanan-sampai-tujuan', $item4->id) }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
                            Sampai Tujuan
                        </a>
                    </div>
                </div>
            @empty
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>                  
                            <tr class="table-row">
                                <td class="column-1" colspan="20">Tidak Ada Pesanan Yang Sedang Dikirim</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforelse

            <h5 style="margin-top: 20px;">Produk Sampai Tujuan</h5>
            @forelse ($items5 as $item5)                
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr> 
                            @foreach ($item5->produk_transaksi as $ite5)                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{ asset('storage/images/gambar-produk/'. $ite5->produk->gambar->img_url) }}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{ $ite5->produk->nama }}</td>
                                <td class="column-3">${{ $ite5->produk->harga }}</td>
                                <td class="column-4 p-l-70">{{ $ite5->quantitas }}</td>
                                <td class="column-5">${{ $ite5->quantitas * $ite5->produk->harga }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5">{{ $item5->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @empty
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>                  
                            <tr class="table-row">
                                <td class="column-1" colspan="20">Tidak Ada Pesanan Yang Sedang Dikirim</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforelse
		</div>
	</section>
@endsection