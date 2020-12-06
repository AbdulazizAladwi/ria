



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
                        <h5> <?php echo e($title); ?></h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-8 col-md-8 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo app('translator')->get('site.home'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.invoices.index')); ?>"><?php echo app('translator')->get('site.invoices'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.invoice.payment-terms', $invoice->paymentTerm->opportunity->id)); ?>"><?php echo app('translator')->get('site.payment_terms'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.invoice.payment-invoices',  $invoice->paymentTerm->id)); ?>"><?php echo app('translator')->get('site.payment_invoice'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.edit'); ?></li>
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
    $html = \Livewire\Livewire::mount('invoice.payment-invoices.edit', ['invoice' => $invoice])->html();
} elseif ($_instance->childHasBeenRendered('ouHqbZH')) {
    $componentId = $_instance->getRenderedChildComponentId('ouHqbZH');
    $componentTag = $_instance->getRenderedChildComponentTagName('ouHqbZH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ouHqbZH');
} else {
    $response = \Livewire\Livewire::mount('invoice.payment-invoices.edit', ['invoice' => $invoice]);
    $html = $response->html();
    $_instance->logRenderedChild('ouHqbZH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/invoices/payment-invoices/edit.blade.php ENDPATH**/ ?>