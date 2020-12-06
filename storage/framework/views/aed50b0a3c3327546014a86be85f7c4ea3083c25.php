<?php $__env->startSection('title', __('site.costing')); ?>
<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-credit-card"></i>
                    </div>
                    <div class="page-title">
                        <h5><?php echo app('translator')->get('site.costing'); ?></h5>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.costing'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('costing.table')->html();
} elseif ($_instance->childHasBeenRendered('T2Swrp7')) {
    $componentId = $_instance->getRenderedChildComponentId('T2Swrp7');
    $componentTag = $_instance->getRenderedChildComponentTagName('T2Swrp7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('T2Swrp7');
} else {
    $response = \Livewire\Livewire::mount('costing.table');
    $html = $response->html();
    $_instance->logRenderedChild('T2Swrp7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/costing/index.blade.php ENDPATH**/ ?>
