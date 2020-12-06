<div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-6 my-3">


                <?php if( $opportunity->hasAllTerms() ): ?>

                    <a class="btn btn-info" href="<?php echo e(route('dashboard.invoice.payment-terms',$opportunity->id)); ?>">
                        <?php echo app('translator')->get('site.go_to_invoices'); ?>
                    </a>

                <?php else: ?>
                     <?php if( $cost != 0 ): ?>
                        <button wire:click.prevent="createRequested" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUpdateTerm">
                            <?php echo app('translator')->get('site.add_term'); ?>
                        </button>
                     <?php else: ?>
                       <span class="btn btn-warning disabled">

                          No cost for this opportunity

                       <span
                    <?php endif; ?>
                 <?php endif; ?>





				 <?php echo $__env->make('dashboard.payment-terms.modals.add-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <?php echo $__env->make('dashboard.payment-terms.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-content-between">

                <div><?php echo app('translator')->get('site.payment_terms'); ?></div>

            </div>
            <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('site.name'); ?></th>
                            <th><?php echo app('translator')->get('site.percentage'); ?></th>
                            <th><?php echo app('translator')->get('site.amount'); ?></th>
                            <th><?php echo app('translator')->get('site.date'); ?></th>
                            <th><?php echo app('translator')->get('site.table_control'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php $__empty_1 = true; $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($term->name); ?></td>
                            <td><?php echo e($term->percentage); ?>%</td>
                            <td><?php echo e($term->amount); ?> <?php echo app('translator')->get('site.currency'); ?></td>
                            <td><?php echo e($term->date); ?></td>
                            <td>
                                <?php if( $term->hasInvoices() ): ?>

                                   <span class="badge badge-warning text-white p-2">

                                        Invoices Added !

                                   </span>

                                <?php else: ?>

                                <button wire:click.prevent="$emit('editRequested',<?php echo e($term->id); ?>)" class="btn btn-info btn-sm">
                                    <i class="icon-edit2"></i>
                                </button>


                                <button wire:click.prevent="$emit('deleteRequested',<?php echo e($term->id); ?>)" class="btn btn-warning btn-sm">
                                    <i class="icon-delete2"></i>
                                </button>

                                <?php endif; ?>
                            </td>


                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p><?php echo app('translator')->get('site.no_records'); ?></p>
                        <?php endif; ?>
                        </tbody>

                        <div class="m-3">
                            <?php echo e($terms->links()); ?>

                        </div>

                    </table>

            </div>
        </div>
    </div>






</div>




<?php $__env->startPush('js'); ?>

<script type="text/javascript">

    Livewire.on('termAdded',() => {


        $('#addUpdateTerm').modal('hide');

        toastr.success('<?php echo trans("site.added_successfully"); ?>');


    })



    Livewire.on('editRequested',() => {


        $('#addUpdateTerm').modal('show');

    })


    Livewire.on('termUpdated',() => {


        $('#addUpdateTerm').modal('hide');

        toastr.success('<?php echo trans("site.updated_successfully"); ?>');


    })

    Livewire.on('deleteRequested',() => {


        $('#deleteTerm').modal('show');


    })


    Livewire.on('termDeleted',() => {


        $('#deleteTerm').modal('hide');

        toastr.success('<?php echo trans("site.deleted_successfully"); ?>');


    })


</script>

<?php $__env->stopPush(); ?>



<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/opportunity/terms-table.blade.php ENDPATH**/ ?>
