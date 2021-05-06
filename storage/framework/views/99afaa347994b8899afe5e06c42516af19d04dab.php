

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Pesanan Belum Divalidasi</h1>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row mx-2 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Total Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"> 
                                <?php
                                    $no = 0;
                                ?>           
                                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $no++;
                                ?>
                                <tr class="text-center">
                                    <td><?php echo e($item->kode_transaksi); ?></td>
                                    <td><?php echo e($item->user->name); ?></td>   
                                    <td><?php echo e($item->total); ?></td>                         
                                    <td>
                                        <a href="<?php echo e(route('tambah-total-bayar', $item->id)); ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?php echo e(route('show-pesanan', $item->id)); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->                   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/pesanan_belum_divalidasi/index.blade.php ENDPATH**/ ?>