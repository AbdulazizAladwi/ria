<div>
<!--<?php if(session()->has('message')): ?>
<div class="col-md-12">
    <div class="alert alert-success"><?php echo e(session('message')); ?></div>
</div>
<?php endif; ?>!-->
<div class="card">
        <div class="card-header">
        <?php echo app('translator')->get('site.costing'); ?>
</div>
<hr>
<?php echo $__env->make('livewire.costing.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-------------------Search Input--------------------------->
<div class="col-sm-3">
   <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('site.search_by_name'); ?>" wire:model="searchTerm" />
</div>
<!-----------------------Costing Table-------------------------->
<div class="card-body">
    <table class="table table-striped m-0">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('site.opportunity_name'); ?></th>
                <th><?php echo app('translator')->get('site.versions'); ?></th>
                <th><?php echo app('translator')->get('site.date'); ?></th>
                <th><?php echo app('translator')->get('site.client'); ?></th>
                <th><?php echo app('translator')->get('site.contacts'); ?></th>
                <th><?php echo app('translator')->get('site.action'); ?></th>
            </tr>
        </thead>
        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <!-----------------Relation------------------->
                <td><?php echo e($row->requirement->opportunity->name); ?></td>
                <td>version<?php echo e($index+1); ?></td>
                <td><?php echo e($row->date->format('d M Y')); ?></td>
                <td><?php echo e($row->client->name); ?></td>
                <td><?php echo e($row->requirement->opportunity->contact->name ?? '-'); ?></td>
                <td>
                <?php if(!$row->cost()->count()>0): ?>
                <a href="<?php echo e(route('dashboard.addcost',$row->id)); ?>" class="btn"><i class="icon-plus"></i></a> <!-- icon-add_box !-->
                <?php endif; ?>
                <!-- <button wire:click="destroy(<?php echo e($row->id); ?>)" class="btn btn-danger btn-sm"><i class="icon-delete2"></i></button> -->
                <?php if($row->cost()->count()>0): ?>
                <a href="<?php echo e(route('dashboard.show',$row->id)); ?>" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                <a href="<?php echo e(route('dashboard.editcost',$row->id)); ?>" class="btn btn-primary btn-sm"><i class="icon-edit2"></i></a>
                <button wire:click.prevent="$emit('deletionConfirm',<?php echo e($row->cost->id ?? $row->id); ?>)" class="btn btn-warning btn-sm"><i
                    class="icon-delete2"></i></button>
                <a href="<?php echo e(route('dashboard.pdf.proposalCosting',$row->id)); ?>" target="_blank" class="btn print"><i class="icon-print2"></i></a>
                
                <button type="button" class="btn" data-toggle="modal" data-target="#myModal_<?php echo e($row->id); ?>"><i class="icon-redo2"></i></button>
                <?php endif; ?>
                </td>
                </div>
            </tr>
            <?php echo $__env->make('emails.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div> 
</div>
<?php echo e($details->links()); ?>


<?php $__env->startPush('js'); ?>

    <script>
        Livewire.on('deletionConfirm', () => {
            $('#ConfirmDeleteCost').modal('show');
        })

        Livewire.on('userdelete', () =>{
            $('#ConfirmDeleteCost').modal('hide');
            toastr.success('<?php echo trans("site.deleted_successfully"); ?>');
        })
        // toastr()->render()


    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/livewire/costing/table.blade.php ENDPATH**/ ?>