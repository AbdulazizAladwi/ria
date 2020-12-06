<!-- Modal -->

<div class="modal fade text-nowrap" wire:ignore.self id="addAction" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <?php echo app('translator')->get('site.add_action'); ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exOne"><?php echo app('translator')->get('site.action'); ?></label>
                            <textarea rows="6" class="form-control" wire:model.lazy="description" placeholder="<?php echo e(trans('site.action')); ?>"></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>



                        <?php if( $showFileInput ): ?>

                        <div class="form-group">

                            <label for=""><?php echo app('translator')->get('site.file'); ?></label>
                            <input id="" type="file" class="form-control-file" wire:model.lazy="actionFile" id=""
                                   placeholder="<?php echo e(trans('site.file')); ?>">
                            <?php $__errorArgs = ['actionFile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <?php endif; ?>


                        <div class="form-group">

                            <label for="exOne"><?php echo app('translator')->get('site.date_time'); ?></label>
                            <input type="datetime-local" class="form-control" wire:model.lazy="date_time" id="exOne"
                                   placeholder="<?php echo e(trans('site.date_time')); ?>">
                            <?php $__errorArgs = ['date_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>


                        <div class="form-group">

                            <label><?php echo app('translator')->get('site.duration'); ?></label>
                            <input type="number" min="1" class="form-control" wire:model.lazy="actionDuration"
                                   placeholder="<?php echo e(trans('site.duration')); ?>">
                            <?php $__errorArgs = ['actionDuration'];
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

                        <button type="submit" wire:click.prevent="addAction"
                                class="btn btn-secondary"><?php echo app('translator')->get('site.add'); ?></button>

                </div>
            </div>
        </div>
    </form>
</div>










<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/actions/modals/add.blade.php ENDPATH**/ ?>
