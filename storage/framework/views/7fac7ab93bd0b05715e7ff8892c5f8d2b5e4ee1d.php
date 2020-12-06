<div>
    <div class="row">
        <div class="col-md-4 ml-3 mb-3">
            <input wire:model="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
        </div>


        <div class="col-md-2">
            <a href="<?php echo e(route('dashboard.permissions.create')); ?>" class="btn btn-primary mb-3 float-btn">
                <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>

            </a>
        </div>



    </div>

    <div class="col-md-12  mx-auto">

        <div class="card">
            <div class="card-header">
                <?php echo app('translator')->get('site.roles'); ?>
                <small>(<?php echo e($roles->total()); ?>)</small>
            </div>


            <div class="card-body">
                <table class="table table-striped m-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->get('site.name'); ?></th>
                        <th><?php echo app('translator')->get('site.control'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($role->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('dashboard.permissions.edit', $role)); ?>" class="btn btn-warning"><i class="icon-edit2"></i></a>
                                <a wire:click.prevent="$emit('deleteConfirmation', <?php echo e($role->id); ?>)" class="btn btn-warning"><i class="icon-delete2"></i></a>
                                <a href="<?php echo e(route('dashboard.permissions.show', $role->id)); ?>" class="btn btn-warning"><i class="icon-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo app('translator')->get('site.no_records'); ?></p>
                    <?php endif; ?>

                </table>
                <?php echo e($roles->links()); ?>

            </div>
        </div>
    </div>

    <!--Modals-->
    <?php echo $__env->make('dashboard.permissions.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('deleteConfirmation', () => {
            $('#ConfirmDeleteRole').modal('show');
        })

        Livewire.on('roleDeleted', () => {
            $('#ConfirmDeleteRole').modal('hide');
            toastr.success('<?php echo trans("site.deleted_successfully"); ?>');

        })

        Livewire.on('cannotDelete', () => {
            $('#ConfirmDeleteRole').modal('hide');
            toastr.warning('<?php echo trans("site.role_cannot-deleted"); ?>');

        })
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/livewire/permission/table.blade.php ENDPATH**/ ?>