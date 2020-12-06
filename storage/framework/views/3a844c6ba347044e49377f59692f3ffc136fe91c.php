<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="showReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo app('translator')->get('site.receipts'); ?></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">


                        <table class="table">
                          <thead>
                                <tr>
                                  <th scope="col"><?php echo app('translator')->get('site.number'); ?></th>
                                  <th scope="col"><?php echo app('translator')->get('site.date'); ?></th>
                                  <th scope="col"><?php echo app('translator')->get('site.file'); ?></th>
                                </tr>
                          </thead>
                          <tbody>


                                <tr>
                                  <th scope="row"><?php echo e($receipt->number ?? '-'); ?></th>
                                  <td><?php echo e($receipt->date ?? '-'); ?></td>
                                  <td>
                                      <a href="<?php echo e(route('dashboard.pdf.receipt', $receipt)); ?>" target="_blank">
                                          <i class="icon-print2"></i>
                                      </a>
                                  </td>
                                </tr>

                          </tbody>
                    </table>

                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/invoices/receipts/modals/show.blade.php ENDPATH**/ ?>