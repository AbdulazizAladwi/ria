<div>
    <div class="filter-sec">
        <div class="row">
            <!--search input-->


            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                    placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
            </div>


            <!--Add button-->
            <div class="col-md-8 text-right">
                <a href="<?php echo e(route('dashboard.users.create')); ?>" class="btn btn-primary  float-btn">

                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </a>
            </div>
        </div>
    </div>




    <?php echo $__env->make('dashboard.users.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.users'); ?>
            <small class="">(<?php echo e($users->total()); ?>)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->get('site.name'); ?></th>
                        <th><?php echo app('translator')->get('site.email'); ?></th>
                        <th><?php echo app('translator')->get('site.roles'); ?></th>

                        <th><?php echo app('translator')->get('site.control'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-success">
                                        <?php echo e($role->name); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>

                            <td>



                                <div class="d-inline-block">
                                    <a
                                        class="btn btn-info btn-sm"
                                        href="<?php echo e(route('dashboard.users.edit',$user->id)); ?>"
                                        >
                                        <i class="icon-edit2"></i>

                                    </a>
                                </div>

                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('prepareDelete',<?php echo e($user->id); ?>)"
                                        class="btn btn-warning btn-sm"><i class="icon-delete2"></i></button>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo app('translator')->get('site.no_records'); ?></p>
                    <?php endif; ?>

            </table>
            </tbody>
            <div class="m-3">
                <?php echo e($users->links()); ?>

            </div>

        </div>
    </div>
</div>



<?php $__env->startPush('js'); ?>
    <script>
        livewire.on('prepareDelete',()=> {
            $('#deleteUser').modal('show');
        })

        livewire.on('userDeleted',()=> {

            $('#deleteUser').modal('hide');
            toastr.success("<?php echo trans('site.deleted_successfully'); ?>")

        })
    </script>
<?php $__env->stopPush(); ?>



<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/user/table.blade.php ENDPATH**/ ?>
