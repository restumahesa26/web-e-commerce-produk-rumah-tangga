@extends('layouts.home')

@section('title')
	<title>Pay</title>
@endsection

@section('content')
    <!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ url('frontend/images/heading-pages-01.jpg') }});">
		<h2 class="l-text2 t-center">
			Pembayaran
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<form action="{{ route('proses-pay', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size-full w-full-sm">
                        Rekening Pembayaran
                    </span>

                    <div class="w-size23 w-full-sm">
                        <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size16 m-t-8 m-b-12">
							<select class="selection-2" name="rekening_pembayaran">
								<option value="">Pilih Rekening Pembayaran</option>
								<option value="1234-5678-9876">1234-5678-9876</option>
								<option value="1357-2468-9753">1357-2468-9753</option>
							</select>
						</div>                       
                    </div>
                </div>

                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size-full w-full-sm">
                        Rekening Pemesan
                    </span>

                    <div class="w-size23 w-full-sm">
                        <div class="size16 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="rekening_user" placeholder="Nomor Rekening User">
                        </div>
                    </div>
                </div>

                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size-full w-full-sm">
                        Masukkan Bukti Pembayaran
                    </span>

                    <div class="w-size23 w-full-sm">
                        <div class="size16 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="file" name="bukti_bayar">
                        </div>
                    </div>
                </div>

                <div class="size15 trans-0-4">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                        Proses Pembayaran
                    </button>
                </div>
            </form>
		</div>
	</section>
@endsection