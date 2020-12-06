
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5><?php echo e($title); ?></h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.setting'); ?></li>
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
            <div>
                <div class="card">
                    <div class="card-header"><?php echo app('translator')->get('site.settings'); ?></div>
                    <form action="<?php echo e(route('dashboard.settings.update')); ?>"  method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for=""><?php echo app('translator')->get('site.name'); ?></label>
                                <input type="text" name="name" value="<?php echo e($setting->name); ?>" class="form-control" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for=""><?php echo app('translator')->get('site.description'); ?></label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control" required><?php echo e($setting->description); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for=""><?php echo app('translator')->get('site.phone'); ?></label>
                                <input type="number" name="phone"  value="<?php echo e($setting->phone); ?>" class="form-control" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for=""><?php echo app('translator')->get('site.email'); ?></label>
                                <input type="email" name="email" value="<?php echo e($setting->email); ?>" class="form-control" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                        </div>
                        <!--------------Monthly Working Days----------------->
                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">Monthly Working Days:</label>
                                <input type="text" name="days" value="<?php echo e($setting->days); ?>" class="form-control" required>
                                <?php $__errorArgs = ['days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6" wire:igonre.self>
                                <label for=""><?php echo app('translator')->get('site.dashboard_logo'); ?></label>
                                <input type="file" class="form-control image" name="dashboard_logo">
                                <?php $__errorArgs = ['dashboard_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>



                            <div class="col-md-6">
                                <img class="image_preview" src="<?php echo e('storage/' . dashboard_setting()['dashboard_logo']); ?>" style="width: 100px;height: 100px" alt="" wire:ignore.self>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for=""><?php echo app('translator')->get('site.admin_image'); ?></label>
                                <input type="file" class="form-control admin-image" name="admin_image">
                                <?php $__errorArgs = ['admin_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <img class="admin-image_preview" src="<?php echo e('storage/' . dashboard_setting()['admin_image']); ?>" style="width: 100px;height: 100px"  alt="" wire:ignore.self>
                            </div>
                        </div>

                            <div class="d-flex justify-content-end">
                                <!-- <div class="col-md-12" style="text-align: right"> -->
                                    <button class="btn btn-secondary"><?php echo app('translator')->get('site.update'); ?></button>
                                <!-- </div> -->
                            </div>


                    </div>
                    </form>
                </div>
            </div>


            <?php $__env->startPush('js'); ?>
                <script>

                    $('.image').change(function () {

                        if (this.files && this.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('.image_preview').attr('src', e.target.result).attr('style', "width: 100px;height: 100px");
                            }

                            reader.readAsDataURL(this.files[0]); // convert to base64 string
                        }
                    })


                    $('.admin-image').change(function () {

                        if (this.files && this.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('.admin-image_preview').attr('src', e.target.result).attr('style', "width: 100px;height: 100px");
                            }

                            reader.readAsDataURL(this.files[0]); // convert to base64 string
                        }
                    })



                </script>

            <?php $__env->stopPush(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/settings/index.blade.php ENDPATH**/ ?>