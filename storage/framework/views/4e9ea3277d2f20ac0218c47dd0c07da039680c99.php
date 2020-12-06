<div>
    <div class="filter-sec">
        <div class="row">



            <!--search input-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_opportunity_name'); ?>">
            </div>

            <div class="col-md-4">
                <select name="type" wire:model="filterStageId" wire:change="getFilterStatus" class="form-control">
                    <option value=""><?php echo app('translator')->get('site.search_by_stage'); ?></option>
                    <?php $__currentLoopData = $filterStages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($index); ?>"><?php echo e($stage); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <?php if($filterStatusByStage): ?>
                <div class="col-md-4">
                    <select wire:model="status" name="type" class="form-control">
                        <option value=""><?php echo app('translator')->get('site.search_by_status'); ?></option>
                        <?php $__currentLoopData = $filterStatusByStage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($index); ?>"><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>

            <!--Add button-->
            <div class="col-md-<?php echo e(is_null($filterStatusByStage) ? 6 : 4); ?> d-flex justify-content-end">
                <a  href="<?php echo e(route('dashboard.opportunities.create')); ?>" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> <?php echo app('translator')->get('site.add'); ?></span>
                </a>
            </div>

            <!--Modals-->


            <?php echo $__env->make('dashboard.opportunities.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.opportunities.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        </div>
    </div>

    <div class="card">
        <div class="card-header">
        <?php echo app('translator')->get('site.opportunities'); ?>
        <small class="">(<?php echo e($opportunities->total()); ?>)</small>
    </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th><?php echo app('translator')->get('site.name'); ?></th>
                    <th><?php echo app('translator')->get('site.client'); ?></th>
                    <th><?php echo app('translator')->get('site.contact'); ?></th>
                    <th><?php echo app('translator')->get('site.stage'); ?></th>
                    <th><?php echo app('translator')->get('site.status'); ?></th>

                    <th><?php echo app('translator')->get('site.opportunity_details'); ?></th>
                    <th><?php echo app('translator')->get('site.control'); ?></th>
                </tr>
                </thead>
                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$opp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index+1); ?></td>
                        <td><?php echo e($opp->name); ?></td>
                        <td><?php echo e($opp->client->name); ?></td>
                        <td><?php echo e($opp->hasContact() ? $opp->contact->name : '-'); ?></td>
                        <td><?php echo e($opp->stageString()); ?></td>
                        <td><?php echo e($opp->statusString()); ?></td>


                        <td>
                            <div style="display: inline-block">
                                <a href="<?php echo e(route('dashboard.opportunities.show', $opp->id)); ?>" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                            </div>
                        </td>
                        <td>
                                <a href="" class="btn btn-warning  btn-sm" wire:click.prevent="$emit('prepareEdit', <?php echo e($opp->id); ?>)"><i class="icon-edit2"></i></a>
                                <a href="" class="btn btn-danger btn-sm d-inline-block" wire:click.prevent="$emit('prepareDelete', <?php echo e($opp->id); ?>)" style="display: inline-block"><i class="icon-delete2"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p><?php echo app('translator')->get('site.no_records'); ?></p>
                <?php endif; ?>

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                <?php echo e($opportunities->links()); ?>

            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>
    <script>
        Livewire.on('updatedSuccessfully', ()=>{
            $('#ChangeStatus').modal('hide');
            toastr.success('<?php echo trans("site.added_successfully"); ?>');
        })


        Livewire.on('prepareDelete', () => {
            $('#ConfirmDeleteClientType').modal('show');
        })


        Livewire.on('deleted_Successfully', ($id) => {
            $('#ConfirmDeleteClientType').modal('hide');
            toastr.success('<?php echo trans("site.deleted_successfully"); ?>');

        })

        Livewire.on('prepareEdit', () => {
            $('#EditOpportunity').modal('show')
        })

        Livewire.on('opportunityNameUpdated', () => {
            $('#EditOpportunity').modal('hide');
            toastr.success("<?php echo trans('site.updated_successfully'); ?>")
        })

    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/opportunity/table.blade.php ENDPATH**/ ?>
