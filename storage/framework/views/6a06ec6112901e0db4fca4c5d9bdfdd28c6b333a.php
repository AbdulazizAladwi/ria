<div>
    <div class="card">

        <!-- filters -->
        <div class="row m-2">
            <!--Add button-->
            <div class="col-md-4 mx-auto" >

                <label><?php echo app('translator')->get('site.from'); ?></label>
                <input wire:change="fromSelected" wire:model.lazy="from" type="date" class="form-control">

            </div>


            <!--search input-->

            <div class="col-md-4 mx-auto" >
                <label><?php echo app('translator')->get('site.to'); ?></label>
                <input wire:model.lazy="to" min="<?php echo e($from ?? now()->toDateString()); ?>" type="date" class="form-control">
            </div>


        </div>


        <div class="row m-2">



            <div class="col-md-4 mx-auto">
                <label><?php echo app('translator')->get('site.select_client'); ?></label>
                <select wire:model.lazy="client" class="form-control">
                    <option value=""><?php echo app('translator')->get('site.select_client'); ?></option>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


        </div>

        <!-- End of filters -->
        <div class="card-header"><?php echo app('translator')->get('site.invoice-report'); ?></div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('site.opportunity_name'); ?></th>
                    <th><?php echo app('translator')->get('site.client'); ?></th>
                    <th><?php echo app('translator')->get('site.contact'); ?></th>
                    <th><?php echo app('translator')->get('site.invoices'); ?></th>
                    <th><?php echo app('translator')->get('site.invoice_date'); ?></th>
                    <th><?php echo app('translator')->get('site.receipts'); ?></th>
                    <th><?php echo app('translator')->get('site.receipt_date'); ?></th>

                </tr>
                </thead>
                <tbody>
                <?php if( !is_null($invoices) ): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>

                            <td><?php echo e($invoice->paymentTerm->opportunity->name); ?></td>

                             <td><?php echo e($invoice->client->name); ?></td>
                             <td><?php echo e($invoice->contact->name ?? "-"); ?></td>
                             <td><?php echo e($invoice->name); ?></td>
                             <td><?php echo e($invoice->created_at->toDateString()); ?></td>
                             <td><?php echo e($invoice->receipt->number ?? "-"); ?></td>
                             <td><?php echo e($invoice->receipt->date ?? '-'); ?></td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <p><?php echo app('translator')->get('site.no_records'); ?></p>

                    <?php endif; ?>
                <?php endif; ?>
                </tbody>

                <div class="m-3">
                    <?php if( !is_null($invoices) ): ?>

                        <?php echo $invoices->links(); ?>


                    <?php endif; ?>
                </div>



            </table>
        </div>
    </div>
</div>






<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/livewire/report/invoice-report.blade.php ENDPATH**/ ?>