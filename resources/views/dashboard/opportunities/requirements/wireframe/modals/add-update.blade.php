<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addUpdate" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @if ( $update )
                            @lang('site.update')
                        @else
                            @lang('site.add')
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">



                        <div class="form-group">
                            <label for="">@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" wire:model.lazy="description" id=""
                                   placeholder="{{ trans('site.description') }}">
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>






                        @if ( $showFileInput )
                        <div class="form-group">
                            <label for="exOne">@lang('site.file')</label>
                            <input type="file" class="form-control" wire:model.lazy="wireframeFile" id="exOne">
                            @error('wireframeFile') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>

                        <button type="submit" wire:click.prevent="addWireframe"
                                class="btn btn-primary">@lang('site.add')</button>


                </div>
            </div>
        </div>
    </form>
</div>
