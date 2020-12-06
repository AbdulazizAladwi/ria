<div>
    <div class="filter-sec">
        <div class="row">
            <!--Add button-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                    placeholder="<?php echo e(trans('site.name')); ?>">

            </div>

            <!-- Modals -->

            <?php echo $__env->make('dashboard.resources.modals.add-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.resources.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





            <!--search input-->

            <div class="col-md-8 d-flex justify-content-end">
                <button wire:click="$emit('createRequested')" class="btn btn-primary mb-3 float-btn" data-toggle="modal">


                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </button>
            </div>


        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <?php echo app('translator')->get('site.resources'); ?>

                <small class="">(<?php echo e($resources->total()); ?>)</small>


        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->get('site.resource_name'); ?></th>
                        <th><?php echo app('translator')->get('site.team'); ?></th>
                        <th><?php echo app('translator')->get('site.resource_price'); ?></th>
                        <th><?php echo app('translator')->get('site.table_control'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>

                            <td><?php echo e($resource->name); ?></td>
                            <td><?php echo e($resource->team->name); ?></td>
                            <td><?php echo e($resource->price); ?> <?php echo app('translator')->get('site.currency'); ?></td>
                            <td>



                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('updateRequested',<?php echo e($resource->id); ?>)"
                                        class="btn btn-info btn-sm">
                                        <i class="icon-edit2"></i>
                                    </button>
                                </div>

                                <div class="d-inline-block">
                                    <button class="btn btn-warning btn-sm"
                                        wire:click.prevent="$emit('deleteRequested',<?php echo e($resource->id); ?>)">
                                        <i class="icon-delete2"></i>

                                    </button>
                                </div>
                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <p><?php echo app('translator')->get('site.no_records'); ?></p>

                    <?php endif; ?>
                </tbody>

            </table>

            <div class="m-3">
                <?php echo $resources->links(); ?>

            </div>

        </div>
    </div>
</div>






<?php $__env->startPush('js'); ?>

    <script>
        Livewire.on('createRequested', () => {

            $('#addUpdate').modal('show');

        })

        Livewire.on('resourceAdded', () => {

            $('#addUpdate').modal('hide');

            toastr.success('<?php echo trans("site.added_successfully"); ?>');

        });

        Livewire.on('updateRequested', (id) => {


            $('#addUpdate').modal('show');

        });


        Livewire.on('resourceUpdated', (id) => {

            $('#addUpdate').modal('hide');
            toastr.success('<?php echo trans("site.updated_successfully"); ?>');

        })


        Livewire.on('deleteRequested', () => {

            $('#deleteResource').modal('show');

        })

        Livewire.on('resourceDeleted', () => {

            $('#deleteResource').modal('hide');

            toastr.success('<?php echo trans("site.deleted_successfully"); ?>');


        })

    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/resource/table.blade.php ENDPATH**/ ?>
