<!-- Modal -->
<form action="">
    <div class="modal fade" wire:ignore.self id="AddClientType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if(!$update)
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Type</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Type</h5>
                    @endif

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exOne">@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" wire:model.lazy="name" id="exOne" placeholder="Client Type">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>
                        @if ($update)
                            <button type="submit" wire:click.prevent="update"
                                    class="btn btn-secondary">@lang('site.update')</button>
                        @else
                            <button type="submit" wire:click.prevent="store"
                                    class="btn btn-secondary">@lang('site.add')</button>
                        @endif

                </div>
            </div>
        </div>
    </div>
</form>
