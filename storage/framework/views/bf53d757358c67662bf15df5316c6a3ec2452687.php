<div>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header" style="text-align: center"><?php echo app('translator')->get('site.create_payment_invoice'); ?>

            </div>
            <div class="card-body">
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
                        <select class="form-control" disabled>
                                <option><?php echo app('translator')->get('site.new'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-3">
                        <label for=""><?php echo app('translator')->get('site.percentage'); ?>:</label>
                        <input type="number" wire:model.lazy="percentage" wire:change="calculateAmount()" class="form-control">
                        <?php $__errorArgs = ['percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p style="color: #ae1c17"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="mt-1"><?php echo e($amount); ?> <?php echo app('translator')->get('site.currency'); ?></div>

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

                    <div class="text-right">
                        <button wire:click.prevent="resetData" class="btn btn-primary"><?php echo app('translator')->get('site.reset'); ?></button>
                        <button wire:click.prevent="store" class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                </div>



            </div>
        </div>
    </div>
</div>

</div>


<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('invoiceAdded', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/invoices/' + <?php echo e($term_id); ?>

        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/invoice/payment-invoices/create.blade.php ENDPATH**/ ?>