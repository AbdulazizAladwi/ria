<div>

    <div class="row">

        <div class="col-md-3 mb-2">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
        </div>

        <div class="col-md-4 mb-2">
            <select wire:model="filteredStatus" class="form-control">
                <option value="">@lang('site.search_by_status')</option>
                @foreach($termStatus as $index=>$status)
                    <option value="{{$index}}">{{\App\Models\PaymentTerm::status()[$index]}}</option>
                @endforeach
            </select>
        </div>


    </div>



    <div class="card">
        <div class="card-header">@lang('site.payment_terms')

            <small class="">({{ $terms->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.percentage')</th>
                    <th>@lang('site.amount')</th>
                    <th>@lang('site.payment_date')</th>
                    <th>@lang('site.status')</th>
                    <th>@lang('site.invoices')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($terms as $index=>$term)
                    <tr>
                        <td>{{ $index + 1  }}</td>
                        <td>{{ $term->name }}</td>
                        <td>{{ $term->percentage }} %</td>
                        <td>{{ $term->amount }} </td>
                        <td>{{ $term->date }} </td>
                        <td>
                            @if($term->isUpcoming())
                                <span class="badge badge-info badge-lg">{{ $term->statusString()}} </span>
                            @elseif($term->isDelayed())
                                <span class="badge badge-danger badge-lg" disabled>{{ $term->statusString()}} </span>
                            @else
                                <span class="badge badge-success badge-lg" disabled>{{ $term->statusString()}} </span>
                            @endif
                        </td>
                        <td>
                            <div style="display: inline-block">
                                <a href="{{route('dashboard.invoice.payment-invoices', $term->id)}}" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
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
                {{ $terms->links() }}
            </div>

        </div>
    </div>
</div>
