<div>
    <div class="filter-sec">
        <div class="row">

            <!--search input-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
            </div>

            <div class="col-md-4">
                <select wire:model="type" name="type" class="form-control">
                    <option value=""><?php echo app('translator')->get('site.search_by_type'); ?></option>
                    <?php $__currentLoopData = $ClientTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <!--Add button-->
            <div class="col-md-4 d-flex justify-content-end">
                <a href="<?php echo e(route('dashboard.clients.create')); ?>" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </a>
            </div>

            <!--delete Modal-->
            <?php echo $__env->make('dashboard.clients.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        </div>
    </div>

    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.clients'); ?>
                    <small class="">(<?php echo e($clients->total()); ?>)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th><?php echo app('translator')->get('site.name'); ?></th>
                    <th><?php echo app('translator')->get('site.type'); ?></th>
                    <th><?php echo app('translator')->get('site.email'); ?></th>
                    <th><?php echo app('translator')->get('site.phone'); ?></th>
                    <th><?php echo app('translator')->get('site.contacts'); ?></th>
                    <th><?php echo app('translator')->get('site.control'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($client->name); ?></td>
                        <td><?php echo e($client->type->name); ?></td>
                        <td><?php echo e($client->email1 ?? '-'); ?></td>
                        <td><?php echo e($client->phone1 ?? '-'); ?></td>
                        <td>

                                <a class="btn btn-success btn-sm" href="<?php echo e(route('dashboard.contacts.view', $client->id)); ?>">
                                    <i class="icon-eye"></i>
                                </a>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php echo e(route('dashboard.clients.show', $client->id)); ?>" class="btn btn-info btn-sm mx-1"><i class="icon-eye"></i></a>

                                <a href="<?php echo e(route('dashboard.clients.edit', $client->id)); ?>" class="btn btn-success btn-sm mx-1"><i class="icon-edit2"></i></a>

                                <a href="" class="btn-sm btn-warning mx-1" wire:click.prevent="$emit('prepareDelete', <?php echo e($client->id); ?>)" data-target="#DeleteClient"><i class="icon-delete2"></i></a>
                            </div>


                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p><?php echo app('translator')->get('site.no_records'); ?></p>
                <?php endif; ?>

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                <?php echo e($clients->links()); ?>

            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('prepareDelete', ()=> {
            $('#DeleteClient').modal('show');
        })

        Livewire.on('ClientDeleted', ()=> {
            $('#DeleteClient').modal('hide');
            toastr.success("<?php echo trans('site.deleted_successfully'); ?>")
        })

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/client/table.blade.php ENDPATH**/ ?>
