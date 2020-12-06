<!-- Modal -->

<div class="modal fade text-nowrap" wire:ignore.self id="addAction" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @lang('site.add_action')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exOne">@lang('site.action')</label>
                            <textarea rows="6" class="form-control" wire:model.lazy="description" placeholder="{{ trans('site.action') }}"></textarea>
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>



                        @if ( $showFileInput )

                        <div class="form-group">

                            <label for="">@lang('site.file')</label>
                            <input id="" type="file" class="form-control-file" wire:model.lazy="actionFile" id=""
                                   placeholder="{{ trans('site.file') }}">
                            @error('actionFile') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                        @endif


                        <div class="form-group">

                            <label for="exOne">@lang('site.date_time')</label>
                            <input type="datetime-local" class="form-control" wire:model.lazy="date_time" id="exOne"
                                   placeholder="{{ trans('site.date_time') }}">
                            @error('date_time') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>


                        <div class="form-group">

                            <label>@lang('site.duration')</label>
                            <input type="number" min="1" class="form-control" wire:model.lazy="actionDuration"
                                   placeholder="{{ trans('site.duration') }}">
                            @error('actionDuration') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>

                        <button type="submit" wire:click.prevent="addAction"
                                class="btn btn-secondary">@lang('site.add')</button>

                </div>
            </div>
        </div>
    </form>
</div>










