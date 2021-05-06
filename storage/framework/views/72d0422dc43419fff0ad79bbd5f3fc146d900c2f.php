

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Masukkan Total Bayar</h1>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="<?php echo e(route('simpan-total-bayar', $item->id)); ?>" method="POST" class="form" id="form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="provinsi">Provinsi Tujuan</label>
                                <input id="provinsi" type="text" class="form-control" placeholder="" value="<?php echo e($item->provinsi); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota / Kabupaten Tujuan</label>
                                <input id="kota" type="text" class="form-control" placeholder="" value="<?php echo e($item->kota); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan Tujuan</label>
                                <input id="kecamatan" type="text" class="form-control" placeholder="" value="<?php echo e($item->kecamatan); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <input id="alamat" type="text" class="form-control" placeholder="" value="<?php echo e($item->alamat_lengkap); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bayar">Total Pesanan</label>
                                <input id="bayar" type="text" class="form-control" placeholder="" value="<?php echo e($item->total); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Masukkan Total Bayar Sekaligus Ongkir</label>
                                <input id="total_bayar" type="text" class="form-control <?php $__errorArgs = ['total_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="total_bayar" placeholder="<?php echo e($item->total); ?>" value="">
                                <?php $__errorArgs = ['total_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block create-confirm">
                                Simpan
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/pesanan_belum_divalidasi/edit.blade.php ENDPATH**/ ?>