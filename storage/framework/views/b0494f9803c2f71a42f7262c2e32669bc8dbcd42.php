<div>
    <div class="filter-sec">
        <div class="row">
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.won_opportunities'); ?>

            <small class="">(<?php echo e($opportunities->total()); ?>)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th><?php echo app('translator')->get('site.opportunity_name'); ?></th>
                    <th><?php echo app('translator')->get('site.client'); ?></th>
                    <th><?php echo app('translator')->get('site.contact'); ?></th>
                    <th><?php echo app('translator')->get('site.payment_terms'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$opportunity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($opportunity->name); ?></td>
                        <td><?php echo e($opportunity->client->name); ?></td>
                        <td><?php echo e($opportunity->contact->name ?? '-'); ?></td>
                        <td>
                            <div style="display: inline-block">
                                <?php if( $opportunity->hasTerms() ): ?>
                                    <a href="<?php echo e(route('dashboard.invoice.payment-terms', $opportunity->id)); ?>" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                                    <?php else: ?>
                                    <p><?php echo app('translator')->get('site.no_terms'); ?></p>
                                <?php endif; ?>
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
                <?php echo e($opportunities->links()); ?>

            </div>

        </div>
    </div>
</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/invoice/table.blade.php ENDPATH**/ ?>