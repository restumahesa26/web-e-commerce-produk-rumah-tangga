

<?php $__env->startSection('content'); ?>
    <!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo e(url('frontend/images/heading-pages-01.jpg')); ?>);">
		<h2 class="l-text2 t-center">
			Order
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
            <h5>Produk Belum Divalidasi Total Harga</h5>
            <?php $__empty_1 = true; $__currentLoopData = $items1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                
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
                            <?php $__currentLoopData = $item1->produk_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $ite1->produk->gambar->img_url)); ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo e($ite1->produk->nama); ?></td>
                                <td class="column-3">$<?php echo e($ite1->produk->harga); ?></td>
                                <td class="column-4 p-l-70"><?php echo e($ite1->quantitas); ?></td>
                                <td class="column-5">$<?php echo e($ite1->quantitas * $ite1->produk->harga); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>

            <h5 style="margin-top: 20px;">Produk Belum Dibayar</h5>
            <?php $__empty_1 = true; $__currentLoopData = $items2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                
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
                            <?php $__currentLoopData = $item2->produk_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $ite2->produk->gambar->img_url)); ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo e($ite2->produk->nama); ?></td>
                                <td class="column-3">$<?php echo e($ite2->produk->harga); ?></td>
                                <td class="column-4 p-l-70"><?php echo e($ite2->quantitas); ?></td>
                                <td class="column-5">$<?php echo e($ite2->quantitas * $ite2->produk->harga); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5"><?php echo e($item2->total); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <a href="<?php echo e(route('show-pay', $item2->id)); ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
                            Bayar
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>

            <h5 style="margin-top: 20px;">Produk Diproses</h5>
            <?php $__empty_1 = true; $__currentLoopData = $items3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                
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
                            <?php $__currentLoopData = $item3->produk_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $ite3->produk->gambar->img_url)); ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo e($ite3->produk->nama); ?></td>
                                <td class="column-3">$<?php echo e($ite3->produk->harga); ?></td>
                                <td class="column-4 p-l-70"><?php echo e($ite3->quantitas); ?></td>
                                <td class="column-5">$<?php echo e($ite3->quantitas * $ite3->produk->harga); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5"><?php echo e($item3->total); ?></td>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>

            <h5 style="margin-top: 20px;">Produk Dikirim</h5>
            <?php $__empty_1 = true; $__currentLoopData = $items4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                
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
                            <?php $__currentLoopData = $item4->produk_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $ite4->produk->gambar->img_url)); ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo e($ite4->produk->nama); ?></td>
                                <td class="column-3">$<?php echo e($ite4->produk->harga); ?></td>
                                <td class="column-4 p-l-70"><?php echo e($ite4->quantitas); ?></td>
                                <td class="column-5">$<?php echo e($ite4->quantitas * $ite4->produk->harga); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5"><?php echo e($item4->total); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <a href="<?php echo e(route('pesanan-sampai-tujuan', $item4->id)); ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="color: #fff;">
                            Sampai Tujuan
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>

            <h5 style="margin-top: 20px;">Produk Sampai Tujuan</h5>
            <?php $__empty_1 = true; $__currentLoopData = $items5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                
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
                            <?php $__currentLoopData = $item5->produk_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?php echo e(asset('storage/images/gambar-produk/'. $ite5->produk->gambar->img_url)); ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo e($ite5->produk->nama); ?></td>
                                <td class="column-3">$<?php echo e($ite5->produk->harga); ?></td>
                                <td class="column-4 p-l-70"><?php echo e($ite5->quantitas); ?></td>
                                <td class="column-5">$<?php echo e($ite5->quantitas * $ite5->produk->harga); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row">
                                <td class="column-1"></td>
                                <td class="column-2"></td>
                                <td class="column-3"></td>
                                <td class="column-4"></td>
                                <td class="column-5"><?php echo e($item5->total); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
            <?php endif; ?>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/order.blade.php ENDPATH**/ ?>