



<?php $__env->startSection('title', __('site.home')); ?>



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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.home'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</header>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="stats-wrapper">
    <div class="row">
    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="stats-widget">
                    <div class="stats-widget-header">
                        <i class="icon-users"></i>
                    </div>
                    <div class="stats-widget-body">
                        <!-- Row start -->
                        <ul class="row no-gutters">
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h6 class="title"><?php echo app('translator')->get('site.clients'); ?></h6>
                            </li>
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h4 class="total"><?php echo e($clientsCount); ?></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="stats-widget">
                    <div class="stats-widget-header">
                        <i class="icon-flash-outline"></i>
                    </div>
                    <div class="stats-widget-body">
                        <!-- Row start -->
                        <ul class="row no-gutters">
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h6 class="title"><?php echo app('translator')->get('site.opportunities'); ?></h6>
                            </li>
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h4 class="total"><?php echo e($opportunitiesCount); ?></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="stats-widget">
                    <div class="stats-widget-header">
                        <i class="icon-flash-outline"></i>
                    </div>
                    <div class="stats-widget-body">
                        <!-- Row start -->
                        <ul class="row no-gutters">
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h6 class="title"><?php echo app('translator')->get('site.won_opportunities'); ?></h6>
                            </li>
                            <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                <h4 class="total"><?php echo e($wonCount); ?></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-header">
                            <i class="icon-flash-outline"></i>
                        </div>
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters">
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h6 class="title"><?php echo app('translator')->get('site.lost_opportunities'); ?></h6>
                                </li>
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h4 class="total"><?php echo e($lostCount); ?></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-header">
                            <i class="icon-flash-outline"></i>
                        </div>
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters">
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h6 class="title"><?php echo app('translator')->get('site.hold_opportunities'); ?></h6>
                                </li>
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h4 class="total"><?php echo e($holdCount); ?></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




          <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-header">
                            <i class="icon-flash-outline"></i>
                        </div>
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters">
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h6 class="title"><?php echo app('translator')->get('site.canceled_opportunities'); ?></h6>
                                </li>
                                <li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
                                    <h4 class="total"><?php echo e($canceledCount); ?></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/home.blade.php ENDPATH**/ ?>
