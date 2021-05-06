

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Data Admin</h1>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row mx-2 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Role</th>
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
                                    <td><?php echo e($item->name); ?></td>   
                                    <td><?php echo e($item->roles); ?></td>                                     
                                    <td>
                                        <?php if($item->roles == 'ADMIN'): ?>
                                            <a href="<?php echo e(route('set-user', $item->id)); ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">Set User</a>
                                        <?php elseif($item->roles == 'USER'): ?>
                                            <a href="<?php echo e(route('set-admin', $item->id)); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">Set Admin</a>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('delete-admin', $item->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tubes_rolin\resources\views/pages/admin/data_admin/index.blade.php ENDPATH**/ ?>