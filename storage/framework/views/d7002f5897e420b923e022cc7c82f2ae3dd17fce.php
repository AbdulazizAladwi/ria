<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addUpdateTerm" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <?php if( $update ): ?>
                            <?php echo app('translator')->get('site.update_term'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('site.add_term'); ?>
                        <?php endif; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">

                            <label><?php echo app('translator')->get('site.name'); ?></label>
                            <input type="text" wire:model.lazy="name" class="form-control"
                            placeholder="<?php echo e(trans('site.name')); ?>"
                            />

                           <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div class="form-group">

                            <label><?php echo app('translator')->get('site.percentage'); ?></label>
                            <input
                            type="number"
                            wire:model.debounce.300ms="percentage"
                            wire:keyup="percentageChanged"
                            class="form-control"
                            placeholder="<?php echo e(trans('site.percentage')); ?>"
                            step="0.01"
                            />

                        <?php $__errorArgs = ['percentage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                        <div class="form-group">

                            <label><?php echo app('translator')->get('site.amount'); ?></label>
                            <input
                            type="number"
                            wire:model.debounce.300ms="amount"
                            wire:keyup="amountChanged"
                            class="form-control"
                            placeholder="<?php echo e(trans('site.amount')); ?>"
                            step="0.01"
                            />
                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                        <div class="form-group">

                            <label><?php echo app('translator')->get('site.date'); ?></label>
                            <input type="date" wire:model.lazy="date" class="form-control"
                            placeholder="<?php echo e(trans('site.date')); ?>"
                            />
                           <?php $__errorArgs = ['date'];
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
                    <?php if($update): ?>
                        <button type="submit" wire:click.prevent="updateTerm()"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.update'); ?></button>
                    <?php else: ?>
                        <button type="submit" wire:click.prevent="addTerm"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/payment-terms/modals/add-update.blade.php ENDPATH**/ ?>