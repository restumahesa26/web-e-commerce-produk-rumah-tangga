

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 mt-3 text-black">Data Produk</h1>
                        <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-sm btn-primary shadow-sm mt-3">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Produk
                        </a>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-2 mt-3">
                        <?php if(Session::has('success-create')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil menambah data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('success-update')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil mengubah data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('success-delete')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil menghapus data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" id="table_id">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
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
                                        <td><?php echo e($no); ?></td>
                                        <td><?php echo e($item->nama); ?></td>   
                                        <td><?php echo e($item->kategori->nama_kategori); ?></td>      
                                        <td><?php echo e($item->stok); ?></td>      
                                        <td><?php echo e($item->harga); ?></td>                                           
                                        <td>
                                            <a href="<?php echo e(route('produk.edit', $item->id)); ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                                title="Edit Data">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="<?php echo e(route('produk.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button class="btn btn-danger delete-confirm" data-toggle="tooltip" data-placement="bottom"
                                                    title="Hapus Data">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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

<?php $__env->startPush('addon-script'); ?>
    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/produk/index.blade.php ENDPATH**/ ?>