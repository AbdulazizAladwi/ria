<div>
    <div class="filter-sec">
        <div class="row">
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">@lang('site.won_opportunities')

            <small class="">({{ $opportunities->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th>@lang('site.opportunity_name')</th>
                    <th>@lang('site.client')</th>
                    <th>@lang('site.contact')</th>
                    <th>@lang('site.payment_terms')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($opportunities as $index=>$opportunity)
                    <tr>
                        <td>{{ $index + 1  }}</td>
                        <td>{{ $opportunity->name }}</td>
                        <td>{{ $opportunity->client->name }}</td>
                        <td>{{ $opportunity->contact->name ?? '-' }}</td>
                        <td>
                            <div style="display: inline-block">
                                @if ( $opportunity->hasTerms() )
                                    <a href="{{route('dashboard.invoice.payment-terms', $opportunity->id)}}" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                                    @else
                                    <p>@lang('site.no_terms')</p>
                                @endif
                            </div>


                        </td>
                    </tr>
                @empty
                    <p>@lang('site.no_records')</p>
                @endforelse

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                {{ $opportunities->links() }}
            </div>

        </div>
    </div>
</div>
