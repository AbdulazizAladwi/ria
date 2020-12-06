<div>
    <div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-6 my-3">


                        <?php if( !$stageIsOver ): ?>
                         <button class="btn btn-primary" data-toggle="modal" wire:click.prevent="$emit('prepareAdd')" data-target="#addRequirement"><?php echo app('translator')->get('site.add_requirement'); ?></button>
                        <?php endif; ?>
                        <?php echo $__env->make('dashboard.opportunities.requirements.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dashboard.opportunities.requirements.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-content-between">

                    <div><?php echo app('translator')->get('site.requirements'); ?></div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('site.requirements'); ?></th>
                            <th><?php echo app('translator')->get('site.deadline'); ?></th>
                            <th><?php echo app('translator')->get('site.details'); ?></th>
                            <th><?php echo app('translator')->get('site.control'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($requirement->requirementString()); ?></td>
                                <td><?php echo e($requirement->deadline); ?></td>
                                <td class="">

                                      <a class="btn btn-info btn-sm m-auto"
                                         href="<?php echo e($requirement->showUrl()); ?>"
                                      >
                                          <i class="icon-eye"></i>

                                      </a>

                                </td>
                                <td>
                                    <button wire:click.prevent="$emit('prepareDelete', <?php echo e($requirement->id); ?>)" class="btn btn-danger btn-sm"><i class="icon-delete2"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p><?php echo app('translator')->get('site.no_records'); ?></p>
                        <?php endif; ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>

</div>





<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/opportunity/requirements/table.blade.php ENDPATH**/ ?>