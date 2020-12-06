<div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header" style="text-align: center"><?php echo app('translator')->get('site.edit_payment_invoice'); ?>


                </div>
                <div class="card-body">

                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for=""><?php echo app('translator')->get('site.invoice_number'); ?>:</label>
                            <span>3223</span>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.invoice_name'); ?>:</label>
                            <input type="text" wire:model.lazy="name" class="form-control">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p style="color: #ae1c17"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-3">
                            <label for=""><?php echo app('translator')->get('site.status'); ?>:</label>
                            <select name="" wire:model="status" class="form-control">
                                <?php $__currentLoopData = $invoiceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>"><?php echo e(\App\Models\Invoice::status()[$index]); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p style="color: #ae1c17"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-3">
                            <label for=""><?php echo app('translator')->get('site.percentage'); ?>:</label>
                            <input type="number" wire:model.lazy="percentage" wire:change="calculateAmount()" class="form-control">
                            <div class="mt-2 text-danger"><?php echo e($calculatedAmount); ?> <?php echo app('translator')->get('site.currency'); ?></div>
                            <?php $__errorArgs = ['percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p style="color: #ae1c17"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.notes'); ?>:</label>
                            <textarea name="" id="" wire:model.lazy="notes" cols="30" rows="10" class="form-control"></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p style="color: #ae1c17"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div>
                        <button wire:click.prevent="update" class="btn btn-primary"><?php echo app('translator')->get('site.update'); ?></button>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('invoiceUpdated', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/invoices/' + <?php echo e($invoice->PaymentTerm->id); ?>

        });

        Livewire.on('addReceiptFirst', param => {
            toastr[param['type']](param['message']);
        });

    </script>
<?php $__env->stopPush(); ?>



<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/invoice/payment-invoices/edit.blade.php ENDPATH**/ ?>