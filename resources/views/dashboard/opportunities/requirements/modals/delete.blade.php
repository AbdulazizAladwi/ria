<!-- Modal -->

<div class="modal fade" wire:ignore.self id="deleteRequirement" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('site.delete_requirement')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                    <h4>@lang('site.confirm_delete')</h4>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.no')</button>

                <button wire:click.prevent="delete"
                        class="btn btn-danger">@lang('site.yes')</button>

            </div>
        </div>
    </div>

</div>
