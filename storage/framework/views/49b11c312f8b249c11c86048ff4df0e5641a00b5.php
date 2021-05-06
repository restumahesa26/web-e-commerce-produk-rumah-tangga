

<?php $__env->startSection('content'); ?>
    <!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo e(url('frontend/images/heading-pages-02.jpg')); ?>);">
		<h2 class="l-text2 t-center">
			HOT PRODUCTS
		</h2>
		<p class="m-text13 t-center">
			New Products In 2021
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
                            <li class="p-t-4">
								<a href="<?php echo e(route('product')); ?>" class="s-text13 active1">
									All
								</a>
							</li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="p-t-4">
                                    <a href="<?php echo e(route('product-category', $category->id)); ?>" class="s-text13">
                                        <?php echo e($category->nama_kategori); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>

						<div class="search-product pos-relative bo4 of-hidden">
                            <form action="<?php echo e(route('search-product')); ?>">
                                <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search" placeholder="Search Products...">
                                <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
                                    <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<span class="s-text8 p-t-5 p-b-5">
							Showing of <?php echo e($items->count()); ?> results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $item->gambar->img_url)); ?>" alt="IMG-PRODUCT">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <a href="<?php echo e(route('add-cart', $item->id)); ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
                                                    Add to Cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="<?php echo e(route('detail-product', $item->id)); ?>" class="block2-name dis-block s-text3 p-b-5">
                                            <?php echo e($item->nama); ?>

                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
                                            $<?php echo e($item->harga); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/product.blade.php ENDPATH**/ ?>