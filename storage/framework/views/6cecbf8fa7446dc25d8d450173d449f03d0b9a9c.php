<!doctype html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Unify Admin Panel" />
		<meta name="keywords" content="CRM, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico" />

		<title> <?php echo app('translator')->get('site.system'); ?> | <?php echo $__env->yieldContent('title'); ?></title>

		<!-- Common CSS -->

		<?php if(app()->getLocale() == 'en'): ?>

		<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/fonts/icomoon/icomoon.css" />
		<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/main.css" />
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/fonts/icomoon/icomoon.css" />
			<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/main-rtl.css" />

        <?php endif; ?>
            <!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Chartist css -->
		<link href="<?php echo e(asset('dashboard')); ?>/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
        <link href="<?php echo e(asset('dashboard')); ?>/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />

        <!-- Our custom css -->
        <?php echo \Livewire\Livewire::styles(); ?>

        <?php echo toastr_css(); ?>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

		<?php echo $__env->yieldPushContent('css'); ?>


		<style>
			button {
				cursor: pointer !important;
			}

            .ck-editor__editable {
                min-height: 150px;
            }
		</style>

        <style>
            .required:after {
                content: "*";
                color: red;
                margin-left: 3px;
            }
        </style>

		<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/custom-style.css" />

	</head>
	<body>

		<!-- Loading starts -->
		<!--	<div class="loading-wrapper">
			<div class="loading">
				<div class="img"></div>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div> -->
		<!-- Loading ends -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">

			<!-- BEGIN .app-heading -->
            <?php echo $__env->make('dashboard.partials._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- END: .app-heading -->


			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->
				<?php echo $__env->make('dashboard.partials._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<!-- END: .app-side -->

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<?php echo $__env->yieldContent('page-header'); ?>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">

                        <?php echo $__env->yieldContent('content'); ?>

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
			</div>
			<!-- END: .app-container -->
			<!-- BEGIN .main-footer -->
			 <?php echo $__env->make('dashboard.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- END: .main-footer -->
		</div>
		<!-- END: .app-wrap -->

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="<?php echo e(asset('dashboard')); ?>/js/jquery.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/js/tether.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/unifyMenu/unifyMenu.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/js/moment.js"></script>

		<!-- JVector Maps -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/gdp-data.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/africa-mill.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/europe-mill.js"></script>

		<!-- Custom JVector Maps -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/custom/map-europe.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/jvectormap/custom/map-africa.js"></script>

		<!-- Chartist JS -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/chartist/js/chartist.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/chartist/js/chartist-tooltip.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/chartist/js/custom/custom-stack-bar.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/chartist/js/custom/custom-line-chart2.js"></script>

		<!-- Newsticker JS -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/newsticker/newsTicker.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Slimscroll JS -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/slimscroll/slimscroll.min.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Slimscroll JS -->
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/sparkline/sparkline-retina.js"></script>
		<script src="<?php echo e(asset('dashboard')); ?>/vendor/sparkline/custom-sparkline.js"></script>

        <!-- Common JS -->

        <script src="<?php echo e(asset('dashboard')); ?>/js/common.js"></script>

        <!-- Our custom js -->

		<!-- toastr-->
        <?php echo toastr_js(); ?>
        <?php echo app('toastr')->render(); ?>

		<!-- livewire -->
        <?php echo \Livewire\Livewire::scripts(); ?>


        <!-- select 2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'features' );
        </script>

        <?php echo $__env->yieldPushContent('js'); ?>

	</body>
</html>
<?php /**PATH F:\laravel-projects\ria\resources\views/layouts/dashboard/app.blade.php ENDPATH**/ ?>