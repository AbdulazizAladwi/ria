



<?php $__env->startSection('title', $title); ?>



<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-extension"></i>
                    </div>
                    <div class="page-title">
                        <h5><?php echo app('translator')->get('site.resources'); ?></h5>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.resources'); ?></li>
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
    $html = \Livewire\Livewire::mount('resource.table')->html();
} elseif ($_instance->childHasBeenRendered('48hdMBQ')) {
    $componentId = $_instance->getRenderedChildComponentId('48hdMBQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('48hdMBQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('48hdMBQ');
} else {
    $response = \Livewire\Livewire::mount('resource.table');
    $html = $response->html();
    $_instance->logRenderedChild('48hdMBQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/resources/index.blade.php ENDPATH**/ ?>
