

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-start">
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-info mt-3 mr-2">Back</a>
                    <h1 class="h3 mb-0 mt-3 text-black">Data Pemesanan</h1>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_transaksi">Kode Transaksi</label>
                            <input id="kode_transaksi" type="text" class="form-control" placeholder="" value="<?php echo e($item->kode_transaksi); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Nama Pemesan</label>
                            <input id="user_id" type="text" class="form-control" placeholder="" value="<?php echo e($item->user->name); ?>" disabled>
                        </div>
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
                            <label for="bayar">Total Bayar</label>
                            <input id="bayar" type="text" class="form-control" placeholder="" value="<?php echo e($item->total); ?>" disabled>
                        </div>
                    </div>
                </div>
                <!-- /.row -->                   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/pesanan_diproses/edit.blade.php ENDPATH**/ ?>