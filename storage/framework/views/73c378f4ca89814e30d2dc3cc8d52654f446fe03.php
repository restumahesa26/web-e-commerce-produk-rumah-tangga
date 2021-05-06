

<?php $__env->startSection('content'); ?>
    <!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			Detail Product
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			<?php echo e($item->kategori->nama_kategori); ?>

			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo e($item->nama); ?>

		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo e(asset('storage/images/gambar-produk/'. $item->gambar->img_url)); ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo e(asset('storage/images/gambar-produk/'. $item->gambar->img_url)); ?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo e($item->nama); ?>

				</h4>

				<span class="m-text17">
					$<?php echo e($item->harga); ?>

				</span>

				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						
					</div>

					<div class="flex-m flex-w">
						
					</div>

					<form action="<?php echo e(route('add-cart-2')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="flex-r-m flex-w p-t-10">
							<div class="w-size16 flex-m flex-w">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num_product" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>

								<input type="hidden" name="id" value="<?php echo e($item->id); ?>">

								<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
									<!-- Button -->
									<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
										Add to Cart
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: MUG-0<?php echo e($item->kategori->id); ?></span>
					<span class="s-text8">Categories: <?php echo e($item->kategori->nama_kategori); ?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo e($item->keterangan); ?>

						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php $__currentLoopData = $item2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item-slick2 p-l-15 p-r-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo e(asset('storage/images/gambar-produk/'. $items->gambar->img_url)); ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="<?php echo e(route('add-cart', $items->id)); ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
												Add to Cart
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="<?php echo e(route('detail-product', $items->id)); ?>" class="block2-name dis-block s-text3 p-b-5" >
										<?php echo e($items->nama); ?>

									</a>

									<span class="block2-price m-text6 p-r-5">
										$<?php echo e($items->harga); ?>

									</span>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/detail-product.blade.php ENDPATH**/ ?>