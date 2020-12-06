<div>
    <div class="card">

        <!-- filters -->
        <div class="row m-2">
            <!--Add button-->
            <div class="col-md-4 mx-auto" >

                <label>@lang('site.from')</label>
                <input wire:change="fromSelected" wire:model.lazy="from" type="date" class="form-control">

            </div>


            <!--search input-->

            <div class="col-md-4 mx-auto" >
                <label>@lang('site.to')</label>
                <input wire:model.lazy="to" min="{{ $from ?? now()->toDateString() }}" type="date" class="form-control">
            </div>


        </div>


        <div class="row m-2">



            <div class="col-md-4 mx-auto">
                <label>@lang('site.select_client')</label>
                <select wire:model.lazy="client" class="form-control">
                    <option value="">@lang('site.select_client')</option>
                    @foreach( $clients as $key => $value )

                        <option value="{{ $key }}">{{ $value }}</option>

                    @endforeach
                </select>
            </div>


        </div>

        <!-- End of filters -->
        <div class="card-header">@lang('site.invoice-report')</div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>@lang('site.opportunity_name')</th>
                    <th>@lang('site.client')</th>
                    <th>@lang('site.contact')</th>
                    <th>@lang('site.invoices')</th>
                    <th>@lang('site.invoice_date')</th>
                    <th>@lang('site.receipts')</th>
                    <th>@lang('site.receipt_date')</th>

                </tr>
                </thead>
                <tbody>
                @if ( !is_null($invoices) )
                    @forelse ( $invoices as $invoice )
                        <tr>

                            <td>{{ $invoice->paymentTerm->opportunity->name }}</td>

                             <td>{{ $invoice->client->name }}</td>
                             <td>{{ $invoice->contact->name ?? "-" }}</td>
                             <td>{{ $invoice->name }}</td>
                             <td>{{ $invoice->created_at->toDateString() }}</td>
                             <td>{{ $invoice->receipt->number ?? "-" }}</td>
                             <td>{{ $invoice->receipt->date ?? '-' }}</td>

                        </tr>

                    @empty

                        <p>@lang('site.no_records')</p>

                    @endforelse
                @endif
                </tbody>

                <div class="m-3">
                    @if ( !is_null($invoices) )

                        {!! $invoices->links() !!}

                    @endif
                </div>



            </table>
        </div>
    </div>
</div>






