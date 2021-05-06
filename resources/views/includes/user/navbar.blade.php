<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.html" class="logo">
			<img src="{{ url('frontend/images/icons/logo.png') }}" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="{{ route('home') }}">Home</a>
					</li>

					<li>
						<a href="{{ route('product') }}">Shop</a>
					</li>

					<li>
						<a href="{{ route('show-order') }}">Order</a>
					</li>

					<li>
						<a href="{{ route('about') }}">About</a>
					</li>

					@if (Auth::user())
						<li>
							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<button type="submit">Logout</button>
							</form>
						</li>
					@else
						<li>
							<a href="{{ route('register') }}">Register</a>
						</li>
						<li>
							<a href="{{ route('login') }}">Login</a>
						</li>
					@endif
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<a href="" class="header-wrapicon1 dis-block">
				<img src="{{ url('frontend/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="{{ url('frontend/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">@if (Auth::user())
							{{ $cart->count() }}
							@else
							{{ $cart }}
						@endif</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						@if (Auth::user())
							@php
							$total = 0;
						@endphp
						@forelse ($cart as $item)
							@php
								$total = $total + ( $item->quantitas * $item->produk->harga );
							@endphp
							<li class="header-cart-item">
								<a href="{{ route('delete-cart', $item->id) }}">
									<div class="header-cart-item-img">
										<img src="{{ asset('storage/images/gambar-produk/'. $item->produk->gambar->img_url) }}" alt="IMG">
									</div>
								</a>

								<div class="header-cart-item-txt">
									<a href="{{ route('detail-product', $item->produk->id) }}" class="header-cart-item-name">
										{{ $item->produk->nama }}
									</a>

									<span class="header-cart-item-info">
										{{ $item->quantitas }} x ${{ $item->produk->harga }}
									</span>
								</div>
							</li>
						@empty
							<li class="header-cart-item">
								<div class="header-cart-item-txt">
									Tidak Ada Produk Dalam Keranjang
								</div>
							</li>
						@endforelse
						@endif
					</ul>

					<div class="header-cart-total">
						@if (Auth::user())
									Total: ${{ $total }}
								@else
									
								@endif
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="{{ route('show-cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">

				<!-- Logo2 -->
				<a href="index.html" class="logo2">
					<img src="{{ url('frontend/images/icons/logo.png') }}" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
					<span class="topbar-email">
						@if (Auth::user())
							{{ Auth::user()->name }}
						@else
							Please login first..
						@endif
					</span>

					<!--  -->
					<a href="{{ route('profile.edit') }}" class="header-wrapicon1 dis-block m-l-30">
						<img src="{{ url('frontend/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="{{ url('frontend/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">@if (Auth::user())
							{{ $cart->count() }}
							@else
							{{ $cart }}
						@endif</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@if (Auth::user())
							@php
							$total = 0;
						@endphp
						@forelse ($cart as $item)
							@php
								$total = $total + ( $item->quantitas * $item->produk->harga );
							@endphp
							<li class="header-cart-item">
								<a href="{{ route('delete-cart', $item->id) }}">
									<div class="header-cart-item-img">
										<img src="{{ asset('storage/images/gambar-produk/'. $item->produk->gambar->img_url) }}" alt="IMG">
									</div>
								</a>

								<div class="header-cart-item-txt">
									<a href="{{ route('detail-product', $item->produk->id) }}" class="header-cart-item-name">
										{{ $item->produk->nama }}
									</a>

									<span class="header-cart-item-info">
										{{ $item->quantitas }} x ${{ $item->produk->harga }}
									</span>
								</div>
							</li>
						@empty
							<li class="header-cart-item">
								<div class="header-cart-item-txt">
									Tidak Ada Produk Dalam Keranjang
								</div>
							</li>
						@endforelse
						@endif
							</ul>

							<div class="header-cart-total">
								@if (Auth::user())
									Total: ${{ $total }}
								@else
									
								@endif
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('show-cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{{ route('home') }}">Home</a>
							</li>

							<li>
								<a href="{{ route('product') }}">Shop</a>
							</li>

							<li>
								<a href="{{ route('show-order') }}">Order</a>
							</li>

							<li>
								<a href="{{ route('about') }}">About</a>
							</li>

							@if (Auth::user())
								<li>
									<form action="{{ route('logout') }}" method="POST">
										@csrf
										<button type="submit">Logout</button>
									</form>
								</li>
							@else
								<li>
									<a href="{{ route('register') }}">Register</a>
								</li>
								<li>
									<a href="{{ route('login') }}">Login</a>
								</li>
							@endif
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="{{ url('frontend/images/icons/logo.png') }}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="{{ route('profile.edit') }}" class="header-wrapicon1 dis-block">
						<img src="{{ url('frontend/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{ url('frontend/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">@if (Auth::user())
							{{ $cart->count() }}
							@else
							{{ $cart }}
						@endif</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@if (Auth::user())
							@php
							$total = 0;
						@endphp
						@forelse ($cart as $item)
							@php
								$total = $total + ( $item->quantitas * $item->produk->harga );
							@endphp
							<li class="header-cart-item">
								<a href="{{ route('delete-cart', $item->id) }}">
									<div class="header-cart-item-img">
										<img src="{{ asset('storage/images/gambar-produk/'. $item->produk->gambar->img_url) }}" alt="IMG">
									</div>
								</a>

								<div class="header-cart-item-txt">
									<a href="{{ route('detail-product', $item->produk->id) }}" class="header-cart-item-name">
										{{ $item->produk->nama }}
									</a>

									<span class="header-cart-item-info">
										{{ $item->quantitas }} x ${{ $item->produk->harga }}
									</span>
								</div>
							</li>
						@empty
							<li class="header-cart-item">
								<div class="header-cart-item-txt">
									Tidak Ada Produk Dalam Keranjang
								</div>
							</li>
						@endforelse
						@endif
							</ul>

							<div class="header-cart-total">
								@if (Auth::user())
									Total: ${{ $total }}
								@else
									
								@endif
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('show-cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								@if (Auth::user())
							{{ Auth::user()->name }}
						@else
							Please login first..
						@endif
							</span>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('home') }}">Home</a>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li>
						<a href="{{ route('product') }}">Shop</a>
					</li>

					<li>
						<a href="{{ route('show-order') }}">Order</a>
					</li>

					<li>
						<a href="{{ route('about') }}">About</a>
					</li>

					@if (Auth::user())
						<li>
							<form action="{{ route('logout') }}" method="POST">
								@csrf
								<button type="submit">Logout</button>
							</form>
						</li>
					@else
						<li>
							<a href="{{ route('register') }}">Register</a>
						</li>
						<li>
							<a href="{{ route('login') }}">Login</a>
						</li>
					@endif
				</ul>
			</nav>
		</div>
	</header>