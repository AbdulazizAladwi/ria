<!-- Modal -->

<div class="modal fade" wire:ignore.self id="EditOpportunity" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @lang('site.edit_name')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">@lang('site.name')</label>
                            <input type="text" wire:model="name" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>

                    <button type="submit" wire:click.prevent="updateOpportunityName"
                            class="btn btn-secondary">@lang('site.update')</button>

                </div>
            </div>
        </div>
    </form>
</div>
