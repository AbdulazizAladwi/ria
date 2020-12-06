<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="AddClientType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php if(!$update): ?>
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Type</h5>
                    <?php else: ?>
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Type</h5>
                    <?php endif; ?>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exOne"><?php echo app('translator')->get('site.name'); ?></label>
                            <input type="text" name="name" class="form-control" wire:model.lazy="name" id="exOne" placeholder="Client Type">
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
                        <?php if($update): ?>
                            <button type="submit" wire:click.prevent="update"
                                    class="btn btn-secondary"><?php echo app('translator')->get('site.update'); ?></button>
                        <?php else: ?>
                            <button type="submit" wire:click.prevent="store"
                                    class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                        <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/client-types/modals/add.blade.php ENDPATH**/ ?>
