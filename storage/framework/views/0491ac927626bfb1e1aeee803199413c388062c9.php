<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Unify Admin Panel" />
    <meta name="keywords" content="Signup, Login, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="<?php echo e(asset('dashboard')); ?>/img/favicon.ico" />

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Common CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/fonts/icomoon/icomoon.css" />

    <!-- Mian and Login css -->

    <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/main.css" />

</head>

<body class="login-bg">

<div class="container">
    <div class="login-screen row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/layouts/dashboard/auth/app.blade.php ENDPATH**/ ?>