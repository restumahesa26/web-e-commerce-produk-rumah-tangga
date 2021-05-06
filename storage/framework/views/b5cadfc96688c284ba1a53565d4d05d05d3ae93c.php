

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Bukti Pembayaran</h1>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="<?php echo e(route('proses-bukti-bayar', $item->id)); ?>" method="POST" class="form" id="form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="rekening_pembayaran">Rekening Pembayaran</label>
                                <input id="rekening_pembayaran" type="text" class="form-control" placeholder="" value="<?php echo e($item->rekening_pembayaran); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rekening_user">Rekening Pemesan</label>
                                <input id="rekening_user" type="text" class="form-control" placeholder="" value="<?php echo e($item->rekening_user); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bukti_bayar">Bukti Pembayaran</label>
                                <img src="<?php echo e(asset('storage/images/bukti-bayar/'. $item->bukti_bayar)); ?>" alt="" style="width: 400px">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block create-confirm">
                                Setujui Pembayaran
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->                   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/pesanan_diproses/accept.blade.php ENDPATH**/ ?>