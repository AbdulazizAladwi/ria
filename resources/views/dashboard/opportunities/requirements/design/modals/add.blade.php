<!-- Modal -->

<div class="modal fade" wire:ignore.self id="AddDesign" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @if(!$isUpdate)
                            @lang('site.add_design')
                        @else
                            @lang('site.edit_design')
                        @endif


                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">@lang('site.description')</label>
                            <input type="text" class="form-control" wire:model.lazy="description">
                             @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="">@lang('site.attachment')</label>
                            <input type="file"  class="form-control" wire:model="design_file">
                            @error('design_file') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>


                    <button type="submit" wire:click.prevent="store" class="btn btn-secondary">
                        @if(!$isUpdate)
                            @lang('site.add')
                        @else
                            @lang('site.update')
                        @endif
                    </button>



                </div>
            </div>
        </div>
    </form>
</div>
