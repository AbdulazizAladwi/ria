<div>

    <div class="row">

        <div class="col-md-3 mb-2">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
        </div>

        <div class="col-md-4 mb-2">
            <select wire:model="filteredStatus" class="form-control">
                <option value=""><?php echo app('translator')->get('site.search_by_status'); ?></option>
                <?php $__currentLoopData = $termStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($index); ?>"><?php echo e(\App\Models\PaymentTerm::status()[$index]); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>


    </div>



    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.payment_terms'); ?>

            <small class="">(<?php echo e($terms->total()); ?>)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th><?php echo app('translator')->get('site.name'); ?></th>
                    <th><?php echo app('translator')->get('site.percentage'); ?></th>
                    <th><?php echo app('translator')->get('site.amount'); ?></th>
                    <th><?php echo app('translator')->get('site.payment_date'); ?></th>
                    <th><?php echo app('translator')->get('site.status'); ?></th>
                    <th><?php echo app('translator')->get('site.invoices'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($term->name); ?></td>
                        <td><?php echo e($term->percentage); ?> %</td>
                        <td><?php echo e($term->amount); ?> </td>
                        <td><?php echo e($term->date); ?> </td>
                        <td>
                            <?php if($term->isUpcoming()): ?>
                                <span class="badge badge-info badge-lg"><?php echo e($term->statusString()); ?> </span>
                            <?php elseif($term->isDelayed()): ?>
                                <span class="badge badge-danger badge-lg" disabled><?php echo e($term->statusString()); ?> </span>
                            <?php else: ?>
                                <span class="badge badge-success badge-lg" disabled><?php echo e($term->statusString()); ?> </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div style="display: inline-block">
                                <a href="<?php echo e(route('dashboard.invoice.payment-invoices', $term->id)); ?>" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p><?php echo app('translator')->get('site.no_records'); ?></p>
                <?php endif; ?>

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                <?php echo e($terms->links()); ?>

            </div>

        </div>
    </div>
</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/invoice/payment-terms/table.blade.php ENDPATH**/ ?>