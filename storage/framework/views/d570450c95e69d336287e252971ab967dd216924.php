



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
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.invoices.index')); ?>"><?php echo app('translator')->get('site.invoices'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.payment_terms'); ?></li>
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
    $html = \Livewire\Livewire::mount('invoice.payment-terms.table', ['opportunity_id' => $opportunity_id])->html();
} elseif ($_instance->childHasBeenRendered('2mtjXeV')) {
    $componentId = $_instance->getRenderedChildComponentId('2mtjXeV');
    $componentTag = $_instance->getRenderedChildComponentTagName('2mtjXeV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2mtjXeV');
} else {
    $response = \Livewire\Livewire::mount('invoice.payment-terms.table', ['opportunity_id' => $opportunity_id]);
    $html = $response->html();
    $_instance->logRenderedChild('2mtjXeV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/invoices/payment-terms/index.blade.php ENDPATH**/ ?>