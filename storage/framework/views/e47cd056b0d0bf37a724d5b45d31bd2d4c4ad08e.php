<div>
    <div class="col-md-10 mx-auto">
        <div class="card">
            <?php if($update): ?>
                <div class="card-header"><?php echo app('translator')->get('site.edit_client'); ?></div>
            <?php else: ?>
                <div class="card-header"><?php echo app('translator')->get('site.add_new_client'); ?></div>
            <?php endif; ?>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="required"><?php echo app('translator')->get('site.name'); ?></label>
                        <input type="text" wire:model.lazy="fields.name" placeholder="<?php echo app('translator')->get('site.name'); ?>" class="form-control required">
                        <?php $__errorArgs = ['fields.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="required"><?php echo app('translator')->get('site.choose_type'); ?></label>
                        <select class="form-control" wire:model.lazy="fields.type_id">
                            <option value=""><?php echo app('translator')->get('site.choose_type'); ?></option>
                            <?php $__currentLoopData = $clientTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($index); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['fields.type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.phone1'); ?></label>

                        <input type="text" wire:model.lazy="fields.phone1" placeholder="<?php echo app('translator')->get('site.phone1'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.phone1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.phone2'); ?></label>
                        <input type="number" wire:model.lazy="fields.phone2" placeholder="<?php echo app('translator')->get('site.phone2'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.phone2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.phone_extension'); ?></label>
                        <input type="number" name="phone_extension" wire:model.lazy="fields.phone_extension" placeholder="<?php echo app('translator')->get('site.phone_extension'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.phone_extension'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.email1'); ?></label>
                        <input type="email" name="email1"  wire:model.lazy="fields.email1" placeholder="<?php echo app('translator')->get('site.email1'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.email1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.email2'); ?></label>
                        <input type="email"  name="email2" wire:model.lazy="fields.email2" placeholder="<?php echo app('translator')->get('site.email2'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.email2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.website'); ?></label>
                        <input type="url"  name="website" wire:model.lazy="fields.website" placeholder="<?php echo app('translator')->get('site.website'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>


                <div class="row mb-1">
                    <div class="col-md-12 h6 mb-0 mt-3"><?php echo app('translator')->get('site.address'); ?> </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label for=""><?php echo app('translator')->get('site.area'); ?></label>
                        <input type="text" name="area" wire:model.lazy="fields.area" placeholder="<?php echo app('translator')->get('site.area'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for=""><?php echo app('translator')->get('site.block'); ?></label>
                        <input type="number" name="block"  wire:model.lazy="fields.block" placeholder="<?php echo app('translator')->get('site.block'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.block'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for=""><?php echo app('translator')->get('site.street'); ?></label>
                        <input type="text" wire:model.lazy="fields.street" placeholder="<?php echo app('translator')->get('site.street'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for=""><?php echo app('translator')->get('site.zip_code'); ?></label>
                        <input type="number"  name="zip_code"  wire:model.lazy="fields.zip_code" placeholder="<?php echo app('translator')->get('site.zip_code'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="h6 mb-0 mt-3 col-md-12"><?php echo app('translator')->get('site.social_media_accounts'); ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.instagram'); ?></label>
                        <input type="url" wire:model.lazy="fields.instagram" placeholder="<?php echo app('translator')->get('site.instagram'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.facebook'); ?></label>
                        <input type="url" wire:model.lazy="fields.facebook" placeholder="<?php echo app('translator')->get('site.facebook'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.twitter'); ?></label>
                        <input type="url" wire:model.lazy="fields.twitter" placeholder="<?php echo app('translator')->get('site.twitter'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo app('translator')->get('site.snapchat'); ?></label>
                        <input type="url" wire:model.lazy="fields.snapchat" placeholder="<?php echo app('translator')->get('site.snapchat'); ?>" class="form-control">
                        <?php $__errorArgs = ['fields.snapchat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                    <div class="wrapper mb-3 mt-5 dotted-wrap" style="">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <span class="h6"><?php echo app('translator')->get('site.sister_companies'); ?></span>
                                <button wire:click.prevent="add" class="btn btn-thirdly btn-sm mx-2">
                                    <i class="icon-plus2 AddCompany"></i>
                                </button>
                            </div>
                        </div>

                        <?php $__currentLoopData = $sisterCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="m-3">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for=""><?php echo app('translator')->get('site.company_name'); ?></label>
                                        <input type="text" wire:model.lazy="sisterCompanies.<?php echo e($index); ?>.name"    placeholder="<?php echo app('translator')->get('site.company_name'); ?>" class="form-control">
                                        <?php $__errorArgs = ["sisterCompanies.".$index.".name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for=""><?php echo app('translator')->get('site.company_phone1'); ?></label>
                                        <input type="text" wire:model.lazy="sisterCompanies.<?php echo e($index); ?>.phone1"  placeholder="<?php echo app('translator')->get('site.company_phone1'); ?>" class="form-control">
                                        <?php $__errorArgs = ["sisterCompanies.".$index.".phone1"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><?php echo app('translator')->get('site.company_phone2'); ?></label>
                                        <input type="number" wire:model.lazy="sisterCompanies.<?php echo e($index); ?>.phone2"  placeholder="<?php echo app('translator')->get('site.company_phone2'); ?>" class="form-control">
                                        <?php $__errorArgs = ["sisterCompanies.".$index.".phone2"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">

                                        <?php if( $update ): ?>
                                            <input disabled type="hidden" wire:model="sisterCompanies.<?php echo e($index); ?>.id">
                                        <?php endif; ?>

                                        <label for=""><?php echo app('translator')->get('site.company_email1'); ?></label>
                                        <input type="email" wire:model.lazy="sisterCompanies.<?php echo e($index); ?>.email1"  placeholder="<?php echo app('translator')->get('site.company_email1'); ?>" class="form-control">
                                        <?php $__errorArgs = ["sisterCompanies.".$index.".email1"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label for=""><?php echo app('translator')->get('site.company_email2'); ?></label>
                                        <input type="email" wire:model.lazy="sisterCompanies.<?php echo e($index); ?>.email2"   placeholder="<?php echo app('translator')->get('site.company_email2'); ?>" class="form-control">
                                        <?php $__errorArgs = ["sisterCompanies.".$index.".email2"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p style="color: #ae1c17"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                </div>

                                <button  wire:click.prevent="remove(<?php echo e($index); ?>)" class="btn btn-danger btn-sm" wire:loading.attr="disabled">
                                    <?php echo app('translator')->get('site.remove'); ?>
                                </button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                <!--submit button-->

                <div style="text-align: right">
                    <button wire:click.prevent="addUpdateClient" class="btn btn-secondary">
                        <?php echo e($update ? trans('site.update') : trans('site.add')); ?>

                    </button>
                </div>

                <!--end of card body-->
            </div>

        </div>
    </div>

</div>
</div>



<?php $__env->startPush('js'); ?>

    <script>
        Livewire.on('clientAdded', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/clients'
        });

        Livewire.on('clientUpdated', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/clients'
        });
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/livewire/client/create-update-client.blade.php ENDPATH**/ ?>