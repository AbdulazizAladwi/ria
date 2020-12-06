<div>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header" style="text-align: center">@lang('site.create_payment_invoice')

            </div>
            <div class="card-body">
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.invoice_name'):</label>
                        <input type="text" wire:model.lazy="name" class="form-control">
                        @error('name')<p style="color: #ae1c17">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-3">
                        <label for="">@lang('site.status'):</label>
                        <select class="form-control" disabled>
                                <option>@lang('site.new')</option>
                        </select>
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-3">
                        <label for="">@lang('site.percentage'):</label>
                        <input type="number" wire:model.lazy="percentage" wire:change="calculateAmount()" class="form-control">
                        @error('percentage')<p style="color: #ae1c17">{{ $message }}</p>@enderror
                        <div class="mt-1">{{$amount}} @lang('site.currency')</div>

                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.notes'):</label>
                        <textarea name="" id="" wire:model.lazy="notes" cols="30" rows="10" class="form-control"></textarea>
                        @error('notes')<p style="color: #ae1c17">{{ $message }}</p>@enderror
                    </div>
                </div>

                    <div class="text-right">
                        <button wire:click.prevent="resetData" class="btn btn-primary">@lang('site.reset')</button>
                        <button wire:click.prevent="store" class="btn btn-secondary">@lang('site.add')</button>
                </div>



            </div>
        </div>
    </div>
</div>

</div>


@push('js')
    <script>
        Livewire.on('invoiceAdded', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/invoices/' + {{$term_id}}
        });
    </script>
@endpush
