<div>
    <div class="row">
        <?php if(count($scopeOfWorks) == 0): ?>
            <div class="col-md-6">
                <a href="<?php echo e(route('dashboard.scope-of-works.create', $requirement->id)); ?>" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>


    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.scope_of_works'); ?></div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('site.versions'); ?></th>
                    <th><?php echo app('translator')->get('site.date'); ?></th>
                    <th><?php echo app('translator')->get('site.details'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $scopeOfWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td> <?php echo app('translator')->get('site.version'); ?>  <?php echo e($index + 1); ?></td>
                        <td><?php echo e($sow->date); ?></td>
                        <td>
                            <a href="<?php echo e(route('dashboard.scope-of-works.show', ['requirement_id' => $requirement->id, 'sow_id' => $sow->id] )); ?>" class="btn"><i class="icon-eye"></i></a>
                            <?php if(!$opportunity->stageIsOver(3)): ?>
                                <a href="<?php echo e(route('dashboard.scope-of-works.edit', ['requirement_id' => $requirement->id, 'sow_id' => $sow->id] )); ?>" class="btn"><i class="icon-edit2"></i></a>
                            <?php endif; ?>
                            <a class="btn" target="_blank" href="<?php echo e(route('dashboard.pdf.sow',$sow->id)); ?>"><i class="icon-print2"></i></a>

                        </td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p><?php echo app('translator')->get('site.no_records'); ?></p>
                <?php endif; ?>
                </tbody>
            </table>


            <div class="form-group mt-3">

                <a href="<?php echo e(route('dashboard.opportunities.show', $opportunity['id'])); ?>" class="btn btn-secondary"><?php echo app('translator')->get('site.back'); ?></a>

            </div>

            <div class="m-3">
                <?php echo e($scopeOfWorks->links()); ?>

            </div>

        </div>
    </div>
</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/opportunity/requirements/scope-of-work/table.blade.php ENDPATH**/ ?>