
<?php $__env->startSection('title', __('site.edit_cost')); ?>
<?php $__env->startSection('page-header'); ?>
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-credit-card"></i>
                    </div>
                    <div class="page-title">
                        <h4><?php echo app('translator')->get('site.edit_costing'); ?></h4>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.costing.index')); ?>"><?php echo app('translator')->get('site.costing'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.edit'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
       <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('costing.edit-cost',['proposal'=>$proposal])->html();
} elseif ($_instance->childHasBeenRendered('8zfywas')) {
    $componentId = $_instance->getRenderedChildComponentId('8zfywas');
    $componentTag = $_instance->getRenderedChildComponentTagName('8zfywas');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8zfywas');
} else {
    $response = \Livewire\Livewire::mount('costing.edit-cost',['proposal'=>$proposal]);
    $html = $response->html();
    $_instance->logRenderedChild('8zfywas', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/costing/edit.blade.php ENDPATH**/ ?>