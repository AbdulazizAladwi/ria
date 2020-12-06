<div>

    <div class="row">

        <!--name filter -->
        <div class="col-md-3 mb-2">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
        </div>

        <!--status filter -->
        <div class="col-md-4 mb-2">
            <select wire:model="filteredStatus" class="form-control">
                <option value="">@lang('site.search_by_status')</option>
                @foreach($invoiceStatus as $index=>$status)
                    <option value="{{$index}}">{{\App\Models\Invoice::status()[$index]}}</option>
                @endforeach
            </select>
        </div>

        <!--change status modal -->
        @if($maxPercent != 100)
            <div class="col-md-5 text-right">
                <a href="{{route('dashboard.invoice.payment-invoices.create', $term_id)}}" class="btn btn-primary text-capitalize float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        @endif

    </div>

        <!--change status modal -->

    @include('dashboard.invoices.payment-invoices.modals.change-status')

    @include('dashboard.invoices.receipts.modals.add')

    @include('dashboard.invoices.receipts.modals.show')



    <div class="card">
        <div class="card-header">@lang('site.payment_invoice')

            <small class="">({{ $invoices->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th> @lang('site.invoice_number') </th>
                    <th> @lang('site.name') </th>
                    <th> @lang('site.date') </th>
                    <th> @lang('site.status')</th>
                    <th> @lang('site.percentage') </th>
                    <th> @lang('site.notes') </th>
                    <th> @lang('site.files') </th>
                    <th> @lang('site.table_control') </th>
                    <th> @lang('site.receipts') </th>
                </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $index=>$invoice)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$invoice->number}}</td>
                            <td>{{$invoice->name}}</td>
                            <td>{{ $invoice->created_at}}</td>
                            <td>{{$invoice->statusString()}}</td>
                            <td>{{$invoice->percentage}} %</td>
                            <td>{{ $invoice->limittedNotes() }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{route('dashboard.pdf.invoice', $invoice)}}" class="d-inline-block mx-1" target="_blank">
                                        <i class="icon-print2"></i>
                                    </a>
                                    <a href="{{route('dashboard.docx.invoice', $invoice)}}" class="d-inline-block mx-1">
                                        <i class="icon-download2"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <!--change status button -->

                                    <div class="changeStatus">
                                        @if($invoice->isPaid()  or $invoice->status != 5)
                                            <button
                                            class="btn btn-thirdly btn-def btn-sm w-100"
                                            wire:click.prevent="getInvoiceId({{$invoice->id}})"
                                            data-toggle="modal"
                                            data-target="#ChangeStatus"
                                            >
                                                @lang('site.change_status')
                                            </button>
                                        @endif
                                    </div>


                                    <div class="d-flex align-items-center mt-2 justify-content-between">
                                        <!--Regenerate and ad receipt buttons -->
                                        <div class="">
                                            @if($invoice->isCancelled())
                                                <a wire:click.prevent="regenerate({{$invoice->id}})" class="btn btn-info btn-sm" style="color: white">@lang('site.regenerate')</a>
                                            @elseif($invoice->isDelivered())
                                                @if ( $invoice->hasReceipt() )
                                                    <span class="badge badge-success mr-2">@lang('site.receipt_added')</span>
                                                @else
                                                    <button wire:click.prevent="$emit('addReceiptRequested',{{ $invoice->id }})" class="btn btn-secondary btn-sm">@lang('site.add_receipt')</button>
                                                @endif
                                            @endif


                                        </div>

                                        <!--edit invoice -->
                                        <div class="">
                                                @if($invoice->status != 5)
                                                    <a href="{{route('dashboard.invoice.payment-invoices.edit', $invoice->id)}}" class="btn btn-info btn-sm"><i class="icon-edit2"></i></a>
                                                @endif
                                            </div>
                                    </div>
                                </div>

                            </td>
                            <td class="row mx-auto">

                                @if ( !$invoice->hasReceipt() )
                                    @lang('site.no_receipts')
                                @else
                                <button wire:click.prevent="$emit('showReceiptRequested',{{ $invoice->id }})" class="btn btn-success btn-sm">
                                    <i class="icon-eye"></i>
                                 </button>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <p>@lang('site.no_records')</p>
                    @endforelse
                </table>
            </tbody>
            <div class="m-3">
                {{ $invoices->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')
    <script>
        Livewire.on('statusUpdated', ()=>{
           $('#ChangeStatus').modal('hide');
        });


        Livewire.on('addReceiptRequested', ()=>{
           $('#addReceipt').modal('show');
        });



        Livewire.on('showReceiptRequested', ()=>{
           $('#showReceipt').modal('show');
        });


        Livewire.on('receiptAdded', ()=>{
            $('#addReceipt').modal('hide');
            toastr.success("{!! trans('site.added_successfully') !!}")
            $('#showReceipt').modal('show');
        });


        Livewire.on('addReceiptFirst', ()=>{
            $('#ChangeStatus').modal('hide');
            toastr.warning("{!! trans('site.add_receipt_first') !!}")
        });

    </script>
@endpush


