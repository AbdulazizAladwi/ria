<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addUpdate" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <?php if( $update ): ?>
                            <?php echo app('translator')->get('site.update_resource'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('site.add_resource'); ?>
                        <?php endif; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exOne"><?php echo app('translator')->get('site.resource_name'); ?></label>
                            <input type="text"  class="form-control" wire:model.lazy="name" id="exOne"
                                placeholder="<?php echo e(trans('site.resource_name')); ?>">
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
                            <label for="exOne"><?php echo app('translator')->get('site.team'); ?></label>
                            <select class="form-control" wire:model.lazy="team_id" id="exOne">
                                <option value=""><?php echo e(trans('site.select_team')); ?></option>
                                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['team_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                        <div class="form-group">
                            <label for="exOne"><?php echo app('translator')->get('site.resource_price'); ?></label>
                            <input type="number" class="form-control" wire:model.lazy="price" id="exOne"
                                placeholder="<?php echo e(trans('site.resource_price')); ?>">
                            <?php $__errorArgs = ['price'];
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
                        <button type="submit" wire:click.prevent="updateResource"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.update'); ?></button>
                    <?php else: ?>
                        <button type="submit" wire:click.prevent="addResource"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/resources/modals/add-update.blade.php ENDPATH**/ ?>
