<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addRequirement" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <?php echo app('translator')->get('site.add_requirement'); ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('site.name'); ?></label>
                            <select name="" id="" wire:model.lazy="type" class="form-control">
                                <option value=""><?php echo app('translator')->get('site.choose_requirement'); ?></option>
                                <?php $__currentLoopData = $getRequirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>"><?php echo e($requirement); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo app('translator')->get('site.deadline'); ?></label>
                            <input type="date" min="<?php echo e(now()->toDateString()); ?>" class="form-control" wire:model="deadline">
                            <?php $__errorArgs = ['deadline'];
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

                    <button type="submit" wire:click.prevent="addRequirement"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/requirements/modals/add.blade.php ENDPATH**/ ?>