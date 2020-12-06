<div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-6 my-3">


                @if( $opportunity->hasAllTerms() )

                    <a class="btn btn-info" href="{{ route('dashboard.invoice.payment-terms',$opportunity->id) }}">
                        @lang('site.go_to_invoices')
                    </a>

                @else
                     @if ( $cost != 0 )
                        <button wire:click.prevent="createRequested" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUpdateTerm">
                            @lang('site.add_term')
                        </button>
                     @else
                       <span class="btn btn-warning disabled">

                          No cost for this opportunity

                       <span
                    @endif
                 @endif


				 {{-- Modal --}}


				 @include('dashboard.payment-terms.modals.add-update')

                 @include('dashboard.payment-terms.modals.delete')



            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-content-between">

                <div>@lang('site.payment_terms')</div>

            </div>
            <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.percentage')</th>
                            <th>@lang('site.amount')</th>
                            <th>@lang('site.date')</th>
                            <th>@lang('site.table_control')</th>
                        </tr>
                        </thead>
                        <tbody>
                         @forelse( $terms as $term )
                        <tr>
                            <td>{{ $term->name }}</td>
                            <td>{{ $term->percentage }}%</td>
                            <td>{{ $term->amount }} @lang('site.currency')</td>
                            <td>{{ $term->date }}</td>
                            <td>
                                @if ( $term->hasInvoices() )

                                   <span class="badge badge-warning text-white p-2">

                                        Invoices Added !

                                   </span>

                                @else

                                <button wire:click.prevent="$emit('editRequested',{{ $term->id }})" class="btn btn-info btn-sm">
                                    <i class="icon-edit2"></i>
                                </button>


                                <button wire:click.prevent="$emit('deleteRequested',{{ $term->id }})" class="btn btn-warning btn-sm">
                                    <i class="icon-delete2"></i>
                                </button>

                                @endif
                            </td>


                        </tr>
                        @empty
                            <p>@lang('site.no_records')</p>
                        @endforelse
                        </tbody>

                        <div class="m-3">
                            {{ $terms->links() }}
                        </div>

                    </table>

            </div>
        </div>
    </div>






</div>




@push('js')

<script type="text/javascript">

    Livewire.on('termAdded',() => {


        $('#addUpdateTerm').modal('hide');

        toastr.success('{!!  trans("site.added_successfully") !!}');


    })



    Livewire.on('editRequested',() => {


        $('#addUpdateTerm').modal('show');

    })


    Livewire.on('termUpdated',() => {


        $('#addUpdateTerm').modal('hide');

        toastr.success('{!!  trans("site.updated_successfully") !!}');


    })

    Livewire.on('deleteRequested',() => {


        $('#deleteTerm').modal('show');


    })


    Livewire.on('termDeleted',() => {


        $('#deleteTerm').modal('hide');

        toastr.success('{!!  trans("site.deleted_successfully") !!}');


    })


</script>

@endpush



