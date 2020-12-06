<div>
<div>
    <?php if( $opportunity->inLastStage() and $stageNumber == 4 ): ?>

        <a wire:click.prevent="$emit('statusClicked',3)" class="btn status-btn <?php echo e($activeStatus == 3 ? 'btn-success text-white' : 'btn-outline-success'); ?>"><?php echo app('translator')->get('site.won'); ?></a>
        <a wire:click.prevent="$emit('statusClicked',5)" class="btn status-btn <?php echo e($activeStatus == 5 ? 'btn-warning text-white' : 'btn-outline-warning'); ?>"><?php echo app('translator')->get('site.hold'); ?></a>
        <a wire:click.prevent="$emit('statusClicked',4)" class="btn status-btn <?php echo e($activeStatus == 4 ? 'btn-danger text-white' : 'btn-outline-danger'); ?>"><?php echo app('translator')->get('site.lost'); ?></a>
        <a wire:click.prevent="$emit('statusClicked',6)" class="btn status-btn <?php echo e($activeStatus == 6 ? 'btn-info text-white' : 'btn-outline-info'); ?>"><?php echo app('translator')->get('site.canceled'); ?></a>

    <?php else: ?>

            <?php if( $showStopBtn ): ?>
                <button class="btn btn-warning"
                wire:click.prevent="$emit('stopClicked',<?php echo e($stageNumber); ?>)"
                ><?php echo app('translator')->get('site.not_qualified'); ?></button>
            <?php endif; ?>


            <button class="btn btn-info"
                    wire:click.prevent="$emit('nextClicked',<?php echo e($stageNumber); ?>)"
            ><?php echo app('translator')->get('site.qualified'); ?>
        </button>

    <?php endif; ?>
</div>
</div>



<?php $__env->startPush('js'); ?>


    <script>
        Livewire.on('statusChanged',() => {
            toastr.success("<?php echo e(trans('site.updated_successfully')); ?>")
        })
    </script>


<?php $__env->stopPush(); ?>


<?php $__env->startPush('css'); ?>

    <style>
        .status-btn{
            cursor: pointer;
        }
        .status-btn:hover{
            color: #FFF !important;
        }
    </style>

<?php $__env->stopPush(); ?>
<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/livewire/opportunity/stage-buttons.blade.php ENDPATH**/ ?>
