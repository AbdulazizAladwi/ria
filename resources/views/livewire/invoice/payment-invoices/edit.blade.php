<div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header" style="text-align: center">@lang('site.edit_payment_invoice')


                </div>
                <div class="card-body">

                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for="">@lang('site.invoice_number'):</label>
                            <span>3223</span>
                        </div>
                    </div>

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
                            <select name="" wire:model="status" class="form-control">
                                @foreach($invoiceStatus as $index=>$status)
                                    <option value="{{$index}}">{{\App\Models\Invoice::status()[$index]}}</option>
                                @endforeach
                            </select>
                            @error('status')<p style="color: #ae1c17">{{ $message }}</p>@enderror

                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-3">
                            <label for="">@lang('site.percentage'):</label>
                            <input type="number" wire:model.lazy="percentage" wire:change="calculateAmount()" class="form-control">
                            <div class="mt-2 text-danger">{{$calculatedAmount}} @lang('site.currency')</div>
                            @error('percentage')<p style="color: #ae1c17">{{ $message }}</p>@enderror

                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.notes'):</label>
                            <textarea name="" id="" wire:model.lazy="notes" cols="30" rows="10" class="form-control"></textarea>
                            @error('notes')<p style="color: #ae1c17">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <button wire:click.prevent="update" class="btn btn-primary">@lang('site.update')</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

@push('js')
    <script>
        Livewire.on('invoiceUpdated', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/invoices/' + {{$invoice->PaymentTerm->id}}
        });

        Livewire.on('addReceiptFirst', param => {
            toastr[param['type']](param['message']);
        });

    </script>
@endpush



