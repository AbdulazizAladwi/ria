<div>
    <div class="filter-sec">
        <div class="row">


            <!--search input-->
            <div class="col-md-4">
                <input wire:model.lazy="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>">
            </div>

            <!--Modals-->
            <?php echo $__env->make('dashboard.client-types.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.client-types.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



            <!--Add button-->
            <div class="col-md-9 d-flex justify-content-end">
                <a wire:click.prevent="prepareAdd" href="" class="btn btn-primary mb-3 float-btn" data-toggle="modal" data-target="#AddClientType">
                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><?php echo app('translator')->get('site.client_types'); ?>
            <small class="">(<?php echo e($types->total()); ?>)</small>
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
                    <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($type->name); ?></td>
                            <td>
                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('updateModal', <?php echo e($type->id); ?>)" class="btn btn-info btn-sm" type="button"
                                        data-toggle="modal" data-target="#AddClientType"><i class="icon-edit2"></i> </button>
                                </div>

                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('deletionConfirm',<?php echo e($type->id); ?>)" class="btn btn-warning btn-sm"><i
                                            class="icon-delete2"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo app('translator')->get('site.no_records'); ?></p>
                    <?php endif; ?>

            </table>
            </tbody>
            <div class="m-3">
                <?php echo e($types->links()); ?>

            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>

    <script>
        Livewire.on('deletionConfirm', () => {
            $('#ConfirmDeleteClientType').modal('show');
        })

        Livewire.on('DeleteClientType', () =>{
            $('#ConfirmDeleteClientType').modal('hide');
            toastr.success('<?php echo trans("site.deleted_successfully"); ?>');
        })


        Livewire.on('updateModal', ($id) => {
            $('#AddClientType').modal('show');
        })

        Livewire.on('ClientTypeAdded', () => {
            $('#AddClientType').modal('hide');
            toastr.success('<?php echo trans("site.added_successfully"); ?>');
        })

        Livewire.on('ClientTypeUpdated', () => {
            $('#AddClientType').modal('hide');
            toastr.success('<?php echo trans("site.updated_successfully"); ?>');

        })


    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/client-type/table.blade.php ENDPATH**/ ?>
