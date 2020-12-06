<div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-6 my-3">



                <?php if( !$stageIsOver ): ?>
                    <?php if( !$hasLastStatus ): ?>
                        <button wire:click.prevent="$emit('prepareCreate')" class="btn btn-primary">
                                    <?php echo app('translator')->get('site.add_action'); ?>
                        </button>
                    <?php endif; ?>
                <?php endif; ?>

                <?php echo $__env->make('dashboard.opportunities.actions.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-content-between">

                <div><?php echo app('translator')->get('site.actions'); ?></div>

            </div>
            <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('site.action'); ?></th>
                            <th><?php echo app('translator')->get('site.date'); ?></th>
                            <th><?php echo app('translator')->get('site.time'); ?></th>
                            <th><?php echo app('translator')->get('site.duration'); ?></th>
                            <th class="text-center"><?php echo app('translator')->get('site.files'); ?></th>
                            <th><?php echo app('translator')->get('site.created_at'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td style="max-width: 300px"><?php echo e($action->wordWrap()); ?></td>
                            <td><?php echo e($action->date()); ?></td>
                            <td><?php echo e($action->time()); ?></td>
                            <td>
                                <?php if( $action->hasDuration() ): ?>
                                    <?php echo e($action->duration); ?> <?php echo app('translator')->get('site.hour'); ?>
                                <?php else: ?>
                                    <p><?php echo app('translator')->get('site.no_duration'); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if( $action->hasFile() ): ?>
                                    <a href="<?php echo e($action->filePath()); ?>" download>
                                        <span class="icon-download3"></span>
                                    </a>
                                    <a  target="_blank" href="<?php echo e($action->filePath()); ?>" class="icon-eye2 ml-2"></a>
                                    <div class="mt-2"><?php echo e($action->getStringFileName()); ?></div>
                                <?php else: ?>
                                 <p><?php echo app('translator')->get('site.no_file'); ?></p>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($action->created_at->format('d M Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p><?php echo app('translator')->get('site.no_records'); ?></p>
                        <?php endif; ?>
                        </tbody>

                        <div class="m-3">
                            <?php echo e($actions->links()); ?>

                        </div>

                    </table>

            </div>
        </div>
    </div>

</div>


<?php $__env->startPush('js'); ?>

    <script>
        Livewire.on('prepareCreate',()=> {
            $('#addAction').modal('show');
        })

        Livewire.on('actionAdded',()=> {
            $('#addAction').modal('hide');
            toastr.success("<?php echo trans('site.added_successfully'); ?>")
        })
    </script>

<?php $__env->stopPush(); ?>

<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/opportunity/actions-table.blade.php ENDPATH**/ ?>
