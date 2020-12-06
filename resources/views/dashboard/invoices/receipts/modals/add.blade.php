<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="addReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">@lang('site.add_receipt')</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label>@lang('site.date')</label>
                            <input type="date" class="form-control" wire:model.defer="date">
                            @error('date')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>
                        <button type="submit" wire:click.prevent="addReceipt" class="btn btn-secondary">@lang('site.add')</button>
                </div>
            </div>
        </div>
    </div>
</form>
