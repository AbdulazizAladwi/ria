<?php if($errors->any()): ?>
<ul>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="alert-md-4 alert-danger"><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?><?php /**PATH F:\laravel-projects\ria\resources\views/layout/errormsg.blade.php ENDPATH**/ ?>