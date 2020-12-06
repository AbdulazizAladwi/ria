<?php $__env->startSection('title', trans('dashboard.login')); ?>


<?php $__env->startSection('content'); ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="<?php echo e(asset('dashboard')); ?>/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-addon" id="email"><i class="icon-account_circle"></i></span>
                            <input value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email ID">
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <br>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                            <input value="<?php echo e(old('password')); ?>" type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="actions clearfix">
                            <a href="<?php echo e(route('password.request')); ?>">Lost password?</a>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('dashboard.login'); ?></button>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="signup-slider"></div>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ranarabie/Work/BackEnd/RIA_internal/resources/views/dashboard/auth/login.blade.php ENDPATH**/ ?>