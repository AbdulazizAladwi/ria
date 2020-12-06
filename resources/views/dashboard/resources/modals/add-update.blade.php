<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addUpdate" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @if ( $update )
                            @lang('site.update_resource')
                        @else
                            @lang('site.add_resource')
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exOne">@lang('site.resource_name')</label>
                            <input type="text"  class="form-control" wire:model.lazy="name" id="exOne"
                                placeholder="{{ trans('site.resource_name') }}">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group">
                            <label for="exOne">@lang('site.team')</label>
                            <select class="form-control" wire:model.lazy="team_id" id="exOne">
                                <option value="">{{ trans('site.select_team') }}</option>
                                @foreach ($teams as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('team_id') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>


                        <div class="form-group">
                            <label for="exOne">@lang('site.resource_price')</label>
                            <input type="number" class="form-control" wire:model.lazy="price" id="exOne"
                                placeholder="{{ trans('site.resource_price') }}">
                            @error('price') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>
                    @if ($update)
                        <button type="submit" wire:click.prevent="updateResource"
                            class="btn btn-secondary">@lang('site.update')</button>
                    @else
                        <button type="submit" wire:click.prevent="addResource"
                            class="btn btn-secondary">@lang('site.add')</button>
                    @endif

                </div>
            </div>
        </div>
    </form>
</div>
