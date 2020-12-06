<div class="card">
    <div class="card-body">
        <div class="mb-4 d-md-flex justify-content-between align-items-center">
            <h6 class="mb-0"><b><?php echo app('translator')->get('site.opportunity_name'); ?> :</b> <?php echo e($proposal->requirement->opportunity->name); ?></h6>
            <p class="mb-0"><b><?php echo app('translator')->get('site.date'); ?>:</b> <?php echo e($proposal->date); ?></p>
        </div>

        <h6><b><?php echo app('translator')->get('site.resource_cost'); ?>:</b></h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('site.resource'); ?></th>
                        <th><?php echo app('translator')->get('site.estimation'); ?></th>
                        <th><?php echo app('translator')->get('site.cost'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $directCost = 0;
                ?>
                <?php $__currentLoopData = $proposal->resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($resource->name); ?></td>
                    <td><?php echo e($resource->pivot->estimation); ?> Days</td>
                    <?php $projCost = number_format((float)$total= ($resource->price / $days->days)*($resource->pivot->estimation), 2, '.', '');
                    $directCost +=$projCost;
                    ?>
                    <td><?php echo e($projCost); ?> KD</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>   
        <!------------------Utilities------------------------>
        <h6><b><?php echo app('translator')->get('site.utilities'); ?></b></h6>
        <!-----------------Choose Other------------------------>
        <h6><b><?php echo app('translator')->get('site.other'); ?> :</b></h6>

        <div class="row mb-3">
            <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cost->type == 'Other'): ?>
            <div class="col-md-3">
            <input type="checkbox" name="Other" value="<?php echo e($cost->cost); ?>" onClick="other(this);"/>
            <label for=""><?php echo e($cost->name); ?></label>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-----------------Choose Indirect------------------------>
        <h6><b><?php echo app('translator')->get('site.indirect'); ?> :</b></h6>
        <div class="row mb-3">
            <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cost->type == 'Indirect'): ?>
            <div class="col-md-3">
            <input type="checkbox" name="Indirect" value="<?php echo e($cost->cost); ?>" onClick="indirect(this);"/>
            <label><?php echo e($cost->name); ?></label>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!---------------------Calculate Cost------------------------->
        <?php echo $__env->make('layout.errormsg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('dashboard.costing.store',$proposal->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="p-2 bg-light mb-3" id="new_prescription_form">
                <p><b><?php echo app('translator')->get('site.direct_cost'); ?>:</b> <?php echo e($directCost); ?> KD</p>
                <p><b><?php echo app('translator')->get('site.other'); ?> :</b><span id="TotalOther"></p>
                <p><b><?php echo app('translator')->get('site.indirect'); ?> :</b> <span id="TotalIndirect"></p>
                <p><b><?php echo app('translator')->get('site.total_cost'); ?> :</b> <span id="TotalCost"></p>
                <table>
                    <tr>
                        <td>
                        <b><?php echo app('translator')->get('site.margin'); ?> :</b> 
                        </td>
                        <td>
                        <input onblur="findTotal()" type="text" name="margin" class="margin form-control" id="margin1" value="<?php echo e(old('margin')); ?>" required/>
                        </td>
                        <td>%</td>
                    </tr>
                    <tr>
                        <td>
                        <b><?php echo app('translator')->get('site.discount'); ?> :</b>
                        </td>
                        <td>
                        <input onblur="finddis()" type="text" name="discount" class="margin form-control" id="margin2" value="<?php echo e(old('discount')); ?>" required/>
                        </td>
                        <td>%</td>
                    </tr>
                    <tr>
                        <td>
                        <b><?php echo app('translator')->get('site.total_project_price'); ?> :</b>
                        </td>
                        <td>
                        <input type="text" name="total" class="form-control" id="total"/>
                        </td>
                        <td>KD</td>
                    </tr>
                </table>
                <!-- <p><b><?php echo app('translator')->get('site.margin'); ?> :</b><input onblur="findTotal()" type="text" name="margin" class="margin" id="margin1" value="<?php echo e(old('margin')); ?>" required/>%</p>
                <p><b><?php echo app('translator')->get('site.discount'); ?> :</b><input onblur="finddis()" type="text" name="discount" class="margin" id="margin2" value="<?php echo e(old('discount')); ?>" required/>%</p>
                <p><b><?php echo app('translator')->get('site.total_project_price'); ?> :</b><input type="text" name="total" id="total"/>KD</p> -->
            </div>
            <!-- <hr> -->
            <div class="p-2 bg-light mb-3">
                <h6><b><?php echo app('translator')->get('site.summary'); ?> :</b></h6>
                <p><b><?php echo app('translator')->get('site.client_details'); ?> :</b></p>
                <span><b><?php echo app('translator')->get('site.client_name'); ?>: </b> <?php echo e($proposal->client->name); ?></span>
                <span><b><?php echo app('translator')->get('site.street_address'); ?>: </b> <?php echo e($proposal->client->address->area); ?> <b>,</b> <?php echo e($proposal->client->address->street); ?> <b>,</b> <?php echo e($proposal->client->address->block); ?></span>
                <br><br>
                <span><b><?php echo app('translator')->get('site.phone_number'); ?>: </b> <?php echo e($proposal->client->phone1); ?> <b>,</b> <?php echo e($proposal->client->phone2); ?></span>
                <span><b><?php echo app('translator')->get('site.city_zip_code'); ?>: </b> <?php echo e($proposal->client->address->zip_code); ?></span>
            </div>
            <!-- <br> -->

            
            <!-- <br> -->
            <div class="p-2 bg-light mb-3">
                <h6><b><?php echo app('translator')->get('site.deliverables'); ?> :</b></h6>
                <ol>
                    <?php $__currentLoopData = $proposal->deliverables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e(\App\Models\Deliverable::deliverables()[$deliverable]); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
            <!-- <br> -->
            <div class="p-2 bg-light mb-3">
                <h6><b><?php echo app('translator')->get('site.technologies'); ?> :</b></h6>
                <ol>
                    <?php $__currentLoopData = $proposal->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e(\App\Models\Technology::technologies()[$technology]); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-secondary btn-sm"><?php echo app('translator')->get('site.save'); ?></button>               
            </div>
        </form>

    </div>
</div>
<script type="text/javascript">
    //================TotalOther=====================
    var totalOther = 0;
    function other(other){
        if(other.checked){
            totalOther+= parseInt(other.value);
        }else{
            totalOther-= parseInt(other.value);
        }
        //alert(total);
        document.getElementById('TotalOther').innerHTML = totalOther + " KD";
        document.getElementById('TotalCost').innerHTML = totalIndirect + totalOther + <?php echo e(number_format((float)$directCost, 2, '.', '')); ?> + " KD";
    }
    //================totalIndirect=====================
    var totalIndirect = 0;
    function indirect(indirect){
        if(indirect.checked){
            totalIndirect+= parseInt(indirect.value);
        }else{
            totalIndirect-= parseInt(indirect.value);
        }
        document.getElementById('TotalIndirect').innerHTML = totalIndirect + " KD";
        document.getElementById('TotalCost').innerHTML = totalIndirect + totalOther + <?php echo e(number_format((float)$directCost, 2, '.', '')); ?> + " KD";
    }
    //==================Margin======================
    function findTotal(){
        var arr = document.getElementsByClassName('margin');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = (totalIndirect + totalOther + <?php echo e(number_format((float)$directCost, 2, '.', '')); ?>) * (1-(tot/100)) ;
    }
    //==================Discount======================
    function finddis(){
        var arr = document.getElementsByClassName('margin');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = (totalIndirect + totalOther + <?php echo e(number_format((float)$directCost, 2, '.', '')); ?>) * (1-(tot/100)) ;
    }
</script><?php /**PATH F:\laravel-projects\ria\resources\views/livewire/costing/add-cost.blade.php ENDPATH**/ ?>