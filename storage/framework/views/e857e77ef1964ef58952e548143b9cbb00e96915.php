


<?php $__env->startSection('title', __('site.show_permissions')); ?>

<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5><?php echo app('translator')->get('site.show_permissions'); ?>  - <?php echo e($role->name); ?></h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.permissions.index')); ?>"><?php echo app('translator')->get('site.roles_permissions'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.show'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10  mx-auto">
            <div class="card">
                <div class="card-header">
                    <?php echo app('translator')->get('site.show'); ?>
                </div>

                <div class="card-body">


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="role" value="<?php echo e($role->name); ?>" class="form-control" disabled>
                            </div>
                        </div>


                        <div class="row">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-md-3" style="margin-top:10px">
                                    <input type="checkbox" <?php echo e($role->permissions->contains($permission->id) ? 'checked' : 'disabled'); ?> name="permissions[]" ><label for=""><?php echo e($permission->name); ?></label><br>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/permissions/show.blade.php ENDPATH**/ ?>