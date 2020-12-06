<div>

    <div class="row">

        <!--name filter -->
        <div class="col-md-3 mb-2">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
        </div>

        <!--status filter -->
        <div class="col-md-4 mb-2">
            <select wire:model="filteredStatus" class="form-control">
                <option value=""><?php echo app('translator')->get('site.search_by_status'); ?></option>
                <?php $__currentLoopData = $invoiceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($index); ?>"><?php echo e(\App\Models\Invoice::status()[$index]); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
        </div>

        <!--change status modal -->
        <?php if($maxPercent != 100): ?>
            <div class="col-md-5 text-right">
                <a href="<?php echo e(route('dashboard.invoice.payment-invoices.create', $term_id)); ?>" class="btn btn-primary"><?php echo app('translator')->get('site.add'); ?></a>
            </div>
        <?php endif; ?>

    </div>

        <!--change status modal -->

    <?php echo $__env->make('dashboard.invoices.payment-invoices.modals.change-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('dashboard.invoices.receipts.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('dashboard.invoices.receipts.modals.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.payment_invoice'); ?>

            <small class="">(<?php echo e($invoices->total()); ?>)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th> <?php echo app('translator')->get('site.invoice_number'); ?> </th>
                    <th> <?php echo app('translator')->get('site.name'); ?> </th>
                    <th> <?php echo app('translator')->get('site.date'); ?> </th>
                    <th> <?php echo app('translator')->get('site.status'); ?></th>
                    <th> <?php echo app('translator')->get('site.percentage'); ?> </th>
                    <th> <?php echo app('translator')->get('site.notes'); ?> </th>
                    <th> <?php echo app('translator')->get('site.files'); ?> </th>
                    <th> <?php echo app('translator')->get('site.table_control'); ?> </th>
                    <th> <?php echo app('translator')->get('site.receipts'); ?> </th>
                </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($invoice->number); ?></td>
                            <td><?php echo e($invoice->name); ?></td>
                            <td><?php echo e($invoice->created_at); ?></td>
                            <td><?php echo e($invoice->statusString()); ?></td>
                            <td><?php echo e($invoice->percentage); ?> %</td>
                            <td><?php echo e($invoice->limittedNotes()); ?></td>
                            <td>
                                <a href="<?php echo e(route('dashboard.pdf.invoice', $invoice)); ?>" class="d-inline-block" target="_blank">
                                    <i class="icon-print2"></i>
                                </a>
                                <a href="<?php echo e(route('dashboard.docx.invoice', $invoice)); ?>" class="d-inline-block">
                                    <i class="icon-download2"></i>
                                </a>
                            </td>
                            <td>
                                <div class="row">

                                    <!--change status button -->

                                        <div class="col-md-4">
                                            <?php if($invoice->isPaid()  or $invoice->status != 5): ?>
                                                <button
                                                class="btn btn-primary d-inline-block"
                                                wire:click.prevent="getInvoiceId(<?php echo e($invoice->id); ?>)"
                                                data-toggle="modal"
                                                data-target="#ChangeStatus"
                                                >
                                                    <?php echo app('translator')->get('site.change_status'); ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>


                                    <!--Regenerate and ad receipt buttons -->
                                    <div class="col-md-4 ml-2">
                                        <?php if($invoice->isCancelled()): ?>
                                            <a wire:click.prevent="regenerate(<?php echo e($invoice->id); ?>)" class="btn btn-secondary btn-sm" style="color: white"><?php echo app('translator')->get('site.regenerate'); ?></a>
                                        <?php elseif($invoice->isDelivered()): ?>
                                            <?php if( $invoice->hasReceipt() ): ?>
                                                <span class="badge badge-success"><?php echo app('translator')->get('site.receipt_added'); ?></span>
                                            <?php else: ?>
                                                <button wire:click.prevent="$emit('addReceiptRequested',<?php echo e($invoice->id); ?>)" class="btn btn-secondary btn-sm"><?php echo app('translator')->get('site.add_receipt'); ?></button>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                    </div>


                                <!--edit invoice -->
                                    <div class="col-md-3">
                                        <?php if($invoice->status != 5): ?>
                                            <a href="<?php echo e(route('dashboard.invoice.payment-invoices.edit', $invoice->id)); ?>" class="btn btn-info btn-sm"><i class="icon-edit2"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </td>
                            <td class="row mx-auto">

                                <?php if( !$invoice->hasReceipt() ): ?>
                                    <?php echo app('translator')->get('site.no_receipts'); ?>
                                <?php else: ?>
                                <button wire:click.prevent="$emit('showReceiptRequested',<?php echo e($invoice->id); ?>)" class="btn btn-success btn-sm">
                                    <i class="icon-eye"></i>
                                 </button>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo app('translator')->get('site.no_records'); ?></p>
                    <?php endif; ?>
                </table>
            </tbody>
            <div class="m-3">
                <?php echo e($invoices->links()); ?>

            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('statusUpdated', ()=>{
           $('#ChangeStatus').modal('hide');
        });


        Livewire.on('addReceiptRequested', ()=>{
           $('#addReceipt').modal('show');
        });


        Livewire.on('showReceiptRequested', ()=>{
           $('#showReceipt').modal('show');
        });



        Livewire.on('receiptAdded', ()=>{
            $('#addReceipt').modal('hide');
            toastr.success("<?php echo trans('site.added_successfully'); ?>")
            $('#showReceipt').modal('show');
        });

        Livewire.on('addReceiptFirst', ()=>{
            $('#ChangeStatus').modal('hide');
            toastr.warning("<?php echo trans('site.add_receipt_first'); ?>")
        });



    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/invoice/payment-invoices/table.blade.php ENDPATH**/ ?>
