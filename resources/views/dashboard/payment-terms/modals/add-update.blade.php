<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addUpdateTerm" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @if ( $update )
                            @lang('site.update_term')
                        @else
                            @lang('site.add_term')
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">

                            <label>@lang('site.name')</label>
                            <input type="text" wire:model.lazy="name" class="form-control"
                            placeholder="{{ trans('site.name') }}"
                            />

                           @error('name') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group">

                            <label>@lang('site.percentage')</label>
                            <input
                            type="number"
                            wire:model.debounce.300ms="percentage"
                            wire:keyup="percentageChanged"
                            class="form-control"
                            placeholder="{{ trans('site.percentage') }}"
                            step="0.01"
                            />

                        @error('percentage') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>


                        <div class="form-group">

                            <label>@lang('site.amount')</label>
                            <input
                            type="number"
                            wire:model.debounce.300ms="amount"
                            wire:keyup="amountChanged"
                            class="form-control"
                            placeholder="{{ trans('site.amount') }}"
                            step="0.01"
                            />
                        @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>


                        <div class="form-group">

                            <label>@lang('site.date')</label>
                            <input type="date" wire:model.lazy="date" class="form-control"
                            placeholder="{{ trans('site.date') }}"
                            />
                           @error('date') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>
                    @if ($update)
                        <button type="submit" wire:click.prevent="updateTerm()"
                            class="btn btn-secondary">@lang('site.update')</button>
                    @else
                        <button type="submit" wire:click.prevent="addTerm"
                            class="btn btn-secondary">@lang('site.add')</button>
                    @endif

                </div>
            </div>
        </div>
    </form>
</div>
