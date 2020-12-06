<div class="card">
    <div class="card-body">
        
        <div class="mb-4 d-md-flex justify-content-between align-items-center">
            <h6 class="mb-0"><b><?php echo app('translator')->get('site.opportunity_name'); ?> :</b> <?php echo e($proposal->requirement->opportunity->name); ?></h6>
            <p class="mb-0"><b><?php echo app('translator')->get('site.date'); ?> :</b> <?php echo e($proposal->date); ?></p>
        </div>
        <h6><?php echo app('translator')->get('site.resource_cost'); ?></h6>

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
                    <td><?php echo e($resource->pivot->estimation); ?> <?php echo app('translator')->get('site.day'); ?></td>
                    <?php $projCost = number_format((float)$total= ($resource->price / $days->days)*($resource->pivot->estimation), 2, '.', '');
                    $directCost +=$projCost;
                    ?>
                    <td><?php echo e($projCost); ?> KD</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!---------------------Calculate Cost------------------------->
        <form action="<?php echo e(route('dashboard.costing.update',$proposal->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div id='DivIdToPrint'>
                <div class="p-2 bg-light mb-3" id="new_prescription_form">
                    <p><b><?php echo app('translator')->get('site.total_cost'); ?> :</b><?php echo e(number_format((float)$price= (($proposal->cost->totalprice)/(1-(($proposal->cost->discount)+($proposal->cost->margin))/100)), 2, '.', '')); ?> KD</p>
                    
                    <table>
                        <tr>
                            <td>
                            <b><?php echo app('translator')->get('site.margin'); ?> :</b> 
                            </td>
                            <td>
                            <input onblur="findTotal()" type="text" class="margin form-control" name="margin" id="margin1" value="<?php echo e($proposal->cost->margin); ?>"/>
                            </td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>
                            <b><?php echo app('translator')->get('site.discount'); ?> :</b>
                            </td>
                            <td>
                            <input onblur="finddis()" type="text" class="margin form-control" name="discount" id="margin2" value="<?php echo e($proposal->cost->discount); ?>"/>
                            </td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>
                            <b><?php echo app('translator')->get('site.total_project_price'); ?> :</b>
                            </td>
                            <td>
                            <input type="text" name="total" class="form-control" id="total" value="<?php echo e($proposal->cost->totalprice); ?>"/>
                            </td>
                            <td>KD</td>
                        </tr>
                    </table>
                    
                    <!-- <p><b><?php echo app('translator')->get('site.margin'); ?> :</b><input onblur="findTotal()" type="text" class="margin" name="margin" id="margin1" value="<?php echo e($proposal->cost->margin); ?>"/>%</p>
                    <p><b><?php echo app('translator')->get('site.discount'); ?> :</b><input onblur="finddis()" type="text" class="margin" name="discount" id="margin2" value="<?php echo e($proposal->cost->discount); ?>"/>%</p>
                    <p><b><?php echo app('translator')->get('site.total_project_price'); ?> :</b><input type="text" name="total" id="total" value="<?php echo e($proposal->cost->totalprice); ?>"/>KD</p> -->
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
                <!-- <p><b><?php echo app('translator')->get('site.date'); ?> :</b> <?php echo e($proposal->date); ?></p> -->
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
            </div>
            <div class="d-flex justify-content-end">
                
                <button type="submit" class="btn btn-secondary btn-sm"><?php echo app('translator')->get('site.save'); ?></button> 
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
//==================Margin======================
function findTotal(){
    var arr = document.getElementsByClassName('margin');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = (<?php echo e(number_format((float)$price, 2, '.', '')); ?>) * (1-(tot/100)) ;
}
//==================Discount======================
function finddis(){
    var arr = document.getElementsByClassName('margin');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = (<?php echo e(number_format((float)$price, 2, '.', '')); ?>) * (1-(tot/100)) ;
}
//====================Print============================
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write(`
    <html>
    <body class="printDiv" onload="window.print()">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/print.css" />
    <div id="letter-bg" style="width:100vw;height:100vh;position: fixed;top:0;left:0;">
        <img src="<?php echo e(asset('dashboard')); ?>/img/print-bg.png" style="height:100%;width:100%;">
    </div>
    <table>
    <thead>
    <tr>
        <td>
            <div class="print-head" style=""></div>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <div class="doc-body m-0" style="position: relative;z-index: 1009;">
            `+divToPrint.innerHTML+`
            </div>
        </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td>
                <div class="print-foot" style=""></div>
            </td>
        </tr>
        </tfoot>
    </table>
    </body>
    </html>
    
    `);
//   newWin.document.close();
//   setTimeout(function(){newWin.close();},10);

}
/*
function printDiv(divName) {
 //alert('s');
 var printContents = '<div id="print-content"><form><table width="30%"><tbody>';
  var inputs, index;

inputs = document.getElementsByTagName('input');
for (index = 0; index < inputs.length - 1; ++index) {

   var fieldName = inputs[index].name;
   var fieldValue = inputs[index].value;

  printContents +='<tr><td><label>'+fieldName+'</label></td>';
  printContents +='<td>'+fieldValue+'</td></tr>';
}

var z = 3; // if you had more labels remeber to change this value 
inputs = document.getElementsByTagName('textarea');
for (index = 0; index < inputs.length; ++index) {

   //var fieldName = inputs[index].name;
    var fieldName = document.getElementsByTagName('label')[z].textContent;
   var fieldValue = inputs[index].value;

  printContents +='<tr><td colspan="2"><label>'+fieldName+'</label><br>'+fieldValue+'</td></tr>';
++z;
}

   printContents +='</tbody></table>';

 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}*/
</script>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/livewire/costing/edit-cost.blade.php ENDPATH**/ ?>