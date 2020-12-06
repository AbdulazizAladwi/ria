



<?php $__env->startSection('title', $title); ?>



<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-file-text2"></i>
                    </div>
                    <div class="page-title">
                        <h5><?php echo e($title); ?></h5>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.activity-report'); ?></li>
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
    $html = \Livewire\Livewire::mount('report.activity-report')->html();
} elseif ($_instance->childHasBeenRendered('Lx46O7k')) {
    $componentId = $_instance->getRenderedChildComponentId('Lx46O7k');
    $componentTag = $_instance->getRenderedChildComponentTagName('Lx46O7k');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Lx46O7k');
} else {
    $response = \Livewire\Livewire::mount('report.activity-report');
    $html = $response->html();
    $_instance->logRenderedChild('Lx46O7k', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/reports/activity.blade.php ENDPATH**/ ?>