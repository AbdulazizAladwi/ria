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
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.opportunities.index')); ?>"><?php echo app('translator')->get('site.opportunities'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.opportunities.show', $opportunity->id)); ?>"><?php echo app('translator')->get('site.details'); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.scope-of-works.index', ['requirement_id' => $requirementId, 'opportunity_id' =>$opportunity->id])); ?>"><?php echo app('translator')->get('site.scope_of_works'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.add'); ?></li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.requirements.scope-of-work.create', [
    'title'             => $title,
    'requirementId'     => $requirementId,
    'opportunity'       => $opportunity,
    'client'            => $client,
    ])->html();
} elseif ($_instance->childHasBeenRendered('cLPzMmc')) {
    $componentId = $_instance->getRenderedChildComponentId('cLPzMmc');
    $componentTag = $_instance->getRenderedChildComponentTagName('cLPzMmc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cLPzMmc');
} else {
    $response = \Livewire\Livewire::mount('opportunity.requirements.scope-of-work.create', [
    'title'             => $title,
    'requirementId'     => $requirementId,
    'opportunity'       => $opportunity,
    'client'            => $client,
    ]);
    $html = $response->html();
    $_instance->logRenderedChild('cLPzMmc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/requirements/scope-of-works/create.blade.php ENDPATH**/ ?>