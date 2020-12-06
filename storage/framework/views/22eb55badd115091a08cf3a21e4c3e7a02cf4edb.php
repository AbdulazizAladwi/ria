<!-- Modal -->

<div class="modal fade" wire:ignore.self id="deleteTerm" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo app('translator')->get('site.delete_term'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                         <h4><?php echo app('translator')->get('site.confirm_delete'); ?></h4>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.no'); ?></button>

                        <button wire:click.prevent="deleteTerm"
                            class="btn btn-secondary"><?php echo app('translator')->get('site.yes'); ?></button>

                </div>
            </div>
        </div>

</div>
<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/payment-terms/modals/delete.blade.php ENDPATH**/ ?>