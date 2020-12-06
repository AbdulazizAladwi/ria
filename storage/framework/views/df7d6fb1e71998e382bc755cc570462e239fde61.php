
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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('site.viewCosting'); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header" style="text-align: center"><?php echo e($proposal->client['name']); ?></div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <h5 for="" style="font-weight: bold" class="mb-2"><?php echo app('translator')->get('site.summary'); ?></h5>

                        <div class="form-row mb-5">
                            <div class="col-md-4">
                                <div style="display: inline-block"><?php echo $proposal->features; ?></div>
                            </div>
                        </div>
<div class="col-md-12">
    <h5 for="" style="font-weight: bold" class="mb-2"><?php echo app('translator')->get('site.opportunity_details'); ?></h5>
        <div class="form-row mb-2">
            <div class="col-md-4">
                <span><?php echo app('translator')->get('site.opportunity_name'); ?> :</span>
        <div style="display: inline-block"><?php echo e($opportunity->name); ?></div>
        </div>
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.current_stage'); ?> :</span>
        <div style="display: inline-block"><?php echo e($opportunity->stages()[$opportunity->stage]); ?></div>
        </div>
    </div>
<div class="form-row mb-5">
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.current_status'); ?> : <?php echo e($opportunity->status ?? '-'); ?> </span>
<div style="display: inline-block"><?php echo e($opportunity->getStatus()[$opportunity->status] ?? ''); ?></div>
</div>
</div>
<div class="form-row mb-1">
    <h5 for="" style="font-weight: bold"><?php echo app('translator')->get('site.client_details'); ?></h5>
</div>
<div class="form-row mb-1">
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.client_name'); ?> : <?php echo e($proposal->client['name']); ?></span>
</div>
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.street_address'); ?> : <?php echo e($proposal->client->address->street ?? '-'); ?></span>
</div>
</div>
<div class="form-row mb-5">
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.phone'); ?> : <?php echo e($proposal->client['phone1']); ?></span>
</div>
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.city_zip_code'); ?> : <?php echo e($proposal->client->address->zip_code ?? '-'); ?></span>
</div>
</div>
<div class="form-row mb-2">
<div class="col-md-4">
    <span><?php echo app('translator')->get('site.date'); ?> :</span>
</div>
<div class="col-md-4">
    <p><?php echo e($proposal->date->format('d M Y')); ?></p>
</div>
</div>
<div class="form-row mb-4">
<div class="col-md-4">
<span><?php echo app('translator')->get('site.deliverables'); ?> :</span>
</div>
<div class="col-md-4">
<ul class="list-group">
<?php $__currentLoopData = $proposal->deliverables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item">
    <?php echo e(\App\Models\Deliverable::deliverables()[$deliverable]); ?>

</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
</div>
<div class="form-row mb-4">
<div class="col-md-4">
<span><?php echo app('translator')->get('site.technologies'); ?> :</span>
</div>
<div class="col-md-4">
<ul class="list-group">
<?php $__currentLoopData = $proposal->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item">
    <?php echo e(\App\Models\Technology::technologies()[$technology]); ?>

</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
</div>
<div class="form-row">
<div class="col-md-4">
<span><?php echo app('translator')->get('site.timeline'); ?> :</span>
</div>
<div class="col-md-4">
<table class="table border">
    <thead>
    <tr>
    <th scope="col"><?php echo app('translator')->get('site.resource'); ?></th>
    <th scope="col"><?php echo app('translator')->get('site.estimation'); ?></th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $proposal->resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($resource->name); ?></td>
        <td><?php echo e($resource->pivot->estimation); ?> Days</td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
</div>
<div class="form-row">
    <div class="col-md-4">
        <span><?php echo app('translator')->get('site.total_project_price'); ?> :</span>
    </div>
    <div class="col-md-4">
        <table class="table border">
            <thead>
            <tr>
                <th scope="col"><?php echo app('translator')->get('site.discount'); ?></th>
                <th scope="col"><?php echo app('translator')->get('site.margin'); ?></th>
                <th scope="col"><?php echo app('translator')->get('site.totalprice'); ?></th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($proposal->cost->discount); ?> %</td>
                    <td><?php echo e($proposal->cost->margin); ?> %</td>
                    <td><?php echo e($proposal->cost->totalprice); ?> KD</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                 </div>
            </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/costing/show.blade.php ENDPATH**/ ?>