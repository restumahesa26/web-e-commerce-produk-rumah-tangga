@extends('layouts.home')

@section('title')
	<title>Cart</title>
@endsection

@section('content')
    <!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ url('frontend/images/heading-pages-01.jpg') }});">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
            <form action="{{ route('update-cart') }}" method="POST">
                @csrf
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
                            @php
                                $total = 0;
                            @endphp
                            @forelse ($keranjang as $produk)
                            @php
                                $total = $total + ( $produk->quantitas * $produk->produk->harga );
                            @endphp 
                                <tr class="table-row">
                                    <td class="column-1">
                                        <a href="{{ route('delete-cart', $produk->id) }}">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">                                            
                                            <img src="{{ asset('storage/images/gambar-produk/'. $produk->produk->gambar->img_url) }}" alt="IMG-PRODUCT">                                            
                                        </div>
                                        </a>
                                    </td>
                                    <td class="column-2">{{ $produk->produk->nama }}</td>
                                    <td class="column-3">${{ $produk->produk->harga }}</td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="size8 m-text18 t-center num-product" type="number" name="quantitas[]" value="{{ $produk->quantitas }}">
                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5">${{ $produk->quantitas * $produk->produk->harga }}</td>
                                </tr>
                                <input type="hidden" name="idKeranjang[]" value="{{ $produk->id }}">
                            @empty
                                
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                            Update Cart
                        </button>
                    </div>
                </div>
            </form>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                            Alamat Pengiriman :
                        </span>

                        <div class="w-size20 w-full-sm">
                            <div class="size13 bo4 m-b-12">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="provinsi" placeholder="Provinsi">
                            </div>
                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="kota" placeholder="Kota / Kabupaten">
                            </div>
                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="kecamatan" placeholder="Kecamatan">
                            </div>
                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="alamat_lengkap" placeholder="Alamat Lengkap">
                            </div>
                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="kode_pos" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            Total:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            ${{ $total }}
                        </span>
                    </div>

                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        @foreach ($keranjang as $keran)
                            <input type="hidden" name="idKeranjang2[]" value="{{ $keran->id }}">
                        @endforeach
                        <input type="hidden" name="total" value="{{ $total }}">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                            Proceed to Checkout
                        </button>
                    </div>
                </form>
			</div>
		</div>
	</section>
@endsection