<!-- Modal For Mail -->
 <div class="modal" id="myModal_<?php echo e($row->id); ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo app('translator')->get('site.email'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <form action="<?php echo e(route('dashboard.post',$row->id)); ?>" method="post">
      <?php echo e(csrf_field()); ?>

     <input type="hidden" value = "<?php echo e($row->id); ?>" name= "proposal_id">
      <label for=""><?php echo app('translator')->get('site.email'); ?> :</label>
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-danger"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <input type="email" class="form-control" name="email" required>
      </div>      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
        <button type="submit" class="btn btn-secondary" id="save"><?php echo app('translator')->get('site.save'); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php /**PATH /home/ranarabie/Work/BackEnd/RIA_internal/resources/views/emails/form.blade.php ENDPATH**/ ?>