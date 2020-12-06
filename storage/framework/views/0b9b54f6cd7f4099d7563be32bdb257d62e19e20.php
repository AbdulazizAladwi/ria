<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="addReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo app('translator')->get('site.add_receipt'); ?></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.date'); ?></label>
                            <input type="date" class="form-control" wire:model.defer="date">
                            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                        <button type="submit" wire:click.prevent="addReceipt" class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /home/ranarabie/Work/BackEnd/RIA_internal/resources/views/dashboard/invoices/receipts/modals/add.blade.php ENDPATH**/ ?>