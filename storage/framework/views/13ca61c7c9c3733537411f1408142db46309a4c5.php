<div>
    <div class="col-sm-10 mx-auto">
        <div class="card">
            <div class="card-header"><?php echo app('translator')->get('site.main_info'); ?></div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.opportunity_name'); ?></label>
                        <h5><?php echo e($opportunity->name); ?></h5>
                    </div>
                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.client'); ?></label>
                        <h5><?php echo e($opportunity->client->name); ?></h5>
                    </div>
                </div>
                <div class="form-row">

                    <?php if( $opportunity->hasContact() ): ?>
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.contact'); ?></label>
                            <h5><?php echo e($opportunity->contact->name); ?></h5>
                        </div>
                    <?php endif; ?>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.current_stage'); ?></label>
                        <h5><?php echo e($opportunity->stageString()); ?></h5>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.current_status'); ?></label>
                        <h5>
                            <?php if( $opportunity->hasStatus() ): ?>
                                <?php echo e($opportunity->statusString()); ?>

                            <?php else: ?>
                                <?php echo app('translator')->get('site.pending'); ?>
                            <?php endif; ?>
                        </h5>
                    </div>




                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.stage_status'); ?></label>
                        <h5>
                            <?php echo e($stageStatus); ?>

                        </h5>
                    </div>


                </div>



                    <ul class="nav nav-tabs" id="myTab" role="tablist">


                        <li class="nav-item" wire:click.prevent="$emit('stageClicked',1)">
                            <a class="nav-link <?php echo e($activeStage == 1 ? 'active' : ''); ?>" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true" aria-expanded="true">
                                <?php echo app('translator')->get('site.prospect'); ?>
                            </a>
                        </li>



                        <?php if( $stagesEnabled[2] ): ?>
                        <li class="nav-item" wire:click.prevent="$emit('stageClicked',2)">
                            <a class="nav-link <?php echo e($activeStage == 2 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[2] ? 'disabled' :''); ?>" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false" aria-expanded="false">
                                <?php echo app('translator')->get('site.qualification'); ?>
                            </a>
                        </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($activeStage == 2 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[2] ? 'disabled' :''); ?>" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.qualification'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if( $stagesEnabled[3] ): ?>
                            <li class="nav-item" wire:click.prevent="$emit('stageClicked',3)">
                                <a class="nav-link <?php echo e($activeStage == 3 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[3] ? 'disabled' :''); ?>" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.pre-sales'); ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($activeStage == 3 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[3] ? 'disabled' :''); ?>" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.pre-sales'); ?>
                                </a>
                            </li>
                        <?php endif; ?>



                        <?php if( $stagesEnabled[4] ): ?>

                            <li class="nav-item" wire:click.prevent="$emit('stageClicked',4)">
                                <a class="nav-link <?php echo e($activeStage == 4 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[4] ? 'disabled' :''); ?>" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.feedback'); ?>
                                </a>
                            </li>

                        <?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link <?php echo e($activeStage == 4 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[4] ? 'disabled' :''); ?>" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.feedback'); ?>
                                </a>
                            </li>

                        <?php endif; ?>


                        <?php if( $opportunity->isWon() ): ?>


                        <li class="nav-item" wire:click.prevent="$emit('paymentClicked')">
                                <a class="nav-link <?php echo e($activeStage == 5 ? 'active' : ''); ?> <?php echo e(!$stagesEnabled[4] ? 'disabled' :''); ?>" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false" aria-expanded="false">
                                    <?php echo app('translator')->get('site.payment_terms'); ?>
                                </a>
                        </li>

                        <?php endif; ?>


                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <?php echo $__env->make('dashboard.opportunities.tabs._one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dashboard.opportunities.tabs._two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dashboard.opportunities.tabs._three', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('dashboard.opportunities.tabs._four', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if( $opportunity->isWon() ): ?>

                          <?php echo $__env->make('dashboard.opportunities.tabs._five', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endif; ?>

                    </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
    <script>

        Livewire.on('prepareDelete', ()=>{
            $('#deleteRequirement').modal('show');
        })


        Livewire.on('requirementDeleted', ()=>{
            $('#deleteRequirement').modal('hide');
            toastr.success("<?php echo trans('site.deleted_successfully'); ?>")

        })

        Livewire.on('requirementAdded', ()=>{
            $('#addRequirement').modal('hide');
            toastr.success(" <?php echo trans('site.added_successfully'); ?>");
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/opportunity/show-copy.blade.php ENDPATH**/ ?>