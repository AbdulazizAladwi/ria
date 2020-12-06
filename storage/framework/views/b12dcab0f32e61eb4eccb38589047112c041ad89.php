<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="ChangeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo app('translator')->get('site.change_status'); ?></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exOne"><?php echo app('translator')->get('site.status'); ?></label>
                                <select wire:model="changedStatus" class="form-control">
                                    <?php $__currentLoopData = $invoiceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($index); ?>"><?php echo e(\App\Models\Invoice::status()[$index]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                        <button type="submit" wire:click.prevent="updateStatus" class="btn btn-secondary"><?php echo app('translator')->get('site.update'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/invoices/payment-invoices/modals/change-status.blade.php ENDPATH**/ ?>