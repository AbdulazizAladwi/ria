<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header"><?php echo e($title); ?></div>


            <div class="card-body">

                <label for=""><?php echo app('translator')->get('site.opportunity_name'); ?></label>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo e($opportunity['name']); ?>" disabled>
                    </div>
                </div>


                <label for=""><?php echo app('translator')->get('site.list_of_features'); ?></label>
                <div class="form-row">
                    <div class="col-md-12" wire:ignore>
                        <textarea wire:model.lazy="features" name="features" id="features" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                </div>
                <div class="form-row mb-3">
                    <?php $__errorArgs = ['features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>


                <div class="bg-light p-2 mb-3">
                    <span for="" style="font-weight: bold"><?php echo app('translator')->get('site.client_details'); ?></span>
                    <div class="form-row mt-2">
                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.client_name'); ?> : </label>
                            <span><?php echo e($client['name']); ?></span>
                        </div>

                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.street_address'); ?></label>
                            <span><?php echo e($client->address->street ?? '-'); ?></span>
                        </div>
                    </div>

                    <div class="form-row mt-2 mb-0">
                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.phone_number'); ?> : </label>
                            <span><?php echo e($client['phone1']); ?></span>
                        </div>


                        <div class="col-md-6">
                            <label for=""><?php echo app('translator')->get('site.city_zip_code'); ?> :</label>
                            <span><?php echo e($client->address->zip_code ?? '-'); ?></span>
                        </div>

                    </div>
                </div>

                
                <div class="form-row mb-3">
                    <div class="col-md-4">
                        <label for=""><?php echo app('translator')->get('site.date'); ?></label>
                        <input type="date" wire:model="fields.date" name="date" class="form-control">
                        <?php $__errorArgs = ['fields.date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4">
                        <label for=""><?php echo app('translator')->get('site.deliverables'); ?></label>
                        <div wire:ignore>
                            <select wire:model="deliverablesContent" name="deliverables" id="deliverables" multiple class="form-control">
                                <?php $__currentLoopData = $deliverables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>"><?php echo e($deliverable); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <?php $__errorArgs = ['deliverablesContent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for=""><?php echo app('translator')->get('site.technologies'); ?></label>
                        <div wire:ignore>
                            <select wire:model="technologiesContent" name="technologies" id="technologies" multiple class="form-control">
                                <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($index); ?>"><?php echo e($technology); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <?php $__errorArgs = ['technologiesContent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- <label for=""><?php echo app('translator')->get('site.deliverables'); ?></label>
                <div class="form-row">
                    <div wire:ignore class="col-md-5">
                        <select wire:model="deliverablesContent" name="deliverables" id="deliverables" multiple class="form-control">
                            <?php $__currentLoopData = $deliverables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($index); ?>"><?php echo e($deliverable); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <?php $__errorArgs = ['deliverablesContent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> -->

                <!-- <label for=""><?php echo app('translator')->get('site.technologies'); ?></label>
                <div class="form-row">
                    <div  class="col-md-5" wire:ignore>
                        <select wire:model="technologiesContent" name="technologies" id="technologies" multiple class="form-control">
                            <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($index); ?>"><?php echo e($technology); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mb-5">
                    <?php $__errorArgs = ['technologiesContent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> -->




                <div class="dotted-wrap">
                    <div class="form-row align-items-center mb-3">
                        <label for=""><?php echo app('translator')->get('site.resources'); ?></label>
                        <a  href="" wire:click.prevent="repeatResourceSection" class="btn btn-thirdly btn-sm repeatResource ml-3"><i class="icon-plus"></i></a>
                    </div>



                    <?php $__currentLoopData = $resourceSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="wrapper">
                            <div class="form-row align-items-end">

                                <div class="col-md-4 form-group" wire:ignore>
                                    <label for=""><?php echo app('translator')->get('site.resources'); ?></label>
                                    <select  wire:model.lazy="resourceSection.<?php echo e($i); ?>.resource"  class="form-control">
                                        <option value=""><?php echo app('translator')->get('site.select_resource'); ?></option>
                                        <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($resource['id']); ?>"><?php echo e($resource['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="col-md-4 form-group" wire:ignore>
                                    <label for=""><?php echo app('translator')->get('site.estimation_type'); ?></label>
                                    <select  wire:model.lazy="resourceSection.<?php echo e($i); ?>.estimation_type"  class="form-control">
                                        <option value=""><?php echo app('translator')->get('site.choose_estimation_type'); ?></option>
                                        <?php $__currentLoopData = $estimation_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($index); ?>"><?php echo e($type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['estimation_type.' .$i.  '.estimation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for=""><?php echo app('translator')->get('site.estimation_time'); ?></label>
                                    <input type="number"  wire:model.lazy="resourceSection.<?php echo e($i); ?>.estimation"  min="1" class="form-control">
                                    <?php $__errorArgs = ['estimation.' .$i.  '.estimation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <?php if($i != 0): ?>
                                <div class="col-md-1 form-group">
                                    <button wire:click.prevent="minusResourceSection( <?php echo e($i); ?> )" style="height: 30px" class="btn btn-danger btn-sm  ml-3">
                                        <i class="icon-minus"></i>
                                    </button>
                                </div>
                                <?php endif; ?>


                            </div>


                            <div class="form-row">
                                <div class="col-md-3">
                                    <?php $__errorArgs = ['resourceSection.' .$i.  '.resource'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-3">
                                    <?php $__errorArgs = ['resourceSection.' .$i.  '.estimation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <div class="col-md-3">
                                    <?php $__errorArgs = ['resourceSection.' .$i.  '.estimation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>



                        </div>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>





                <div class="form-row form-group mt-3 justify-content-end form-controls">
                    <div class="col-md-1">
                        <a href="" class="btn btn-danger ml-3" wire:click.prevent="resetAllInputs"><?php echo app('translator')->get('site.reset'); ?></a>
                    </div>

                    <div class="col-md-1">

                        <button type="submit" wire:click.pervent="store" class="btn btn-secondary ml-3 test"><?php echo app('translator')->get('site.save'); ?></button>
                    </div>

                </div>

            </div>

            
        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>


    <script>
        $(document).ready(function () {
            CKEDITOR.instances['features'].on('change', function(e){
            window.livewire.find('<?php echo e($_instance->id); ?>').set('features', e.editor.getData());
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#technologies, #deliverables').select2({
                placeholder: 'Select an option',
            });

            $('#deliverables').on('change', function (e) {
                var data = $('#deliverables').select2("val");
            window.livewire.find('<?php echo e($_instance->id); ?>').set('deliverablesContent', data)
            });

            $('#technologies').on('change', function (e) {
                var data = $('#technologies').select2("val");
            window.livewire.find('<?php echo e($_instance->id); ?>').set('technologiesContent', data)
            });
        });

    </script>

    <script>
        Livewire.on('proposalAdded', () => {
            toastr.success(" <?php echo trans('site.added_successfully'); ?> ")
            $('#deliverables').val(null).trigger('change');
            $('#technologies').val(null).trigger('change');
            CKEDITOR.instances['features'].setData('');
        });

        Livewire.on('resetInputs', () => {
            $('#deliverables').val(null).trigger('change');
            $('#technologies').val(null).trigger('change');
            CKEDITOR.instances['features'].setData('');
        });


    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH F:\laravel-projects\ria\resources\views/livewire/opportunity/requirements/scope-of-work/create.blade.php ENDPATH**/ ?>