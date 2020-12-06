<div>
    <div class="card">

        <div class="row m-3">
            <div class="col-md-4 mx-auto">
                <label for="">@lang('site.from')</label>
                <input type="date" wire:model="from" class="form-control">
            </div>

            <div class="col-md-4 mx-auto">
                <label for="">@lang('site.to')</label>
                <input type="date" wire:model="to" class="form-control">
            </div>

        </div>

        <div class="row m-3">
            <div class="col-md-4 mx-auto">
                <label for="">@lang('site.select_client')</label>
                <select name="" id="" wire:model="client" class="form-control">
                    <option value="">@lang('site.select_client')</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-header">@lang('site.proposal-report')</div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>@lang('site.proposal_opportunity')</th>
                    <th>@lang('site.versions')</th>
                    <th>@lang('site.date')</th>
                    <th>@lang('site.client')</th>
                </tr>
                </thead>
                <tbody>

                @if($proposals)
                    @forelse($proposals  as $index=>$proposal)
                        <tr>
                            <td>{{$proposal->requirement->opportunity->name}}</td>
                            <td>@lang('site.version') {{$index+1}}</td>

                            <td>{{$proposal->date}}</td>
                            <td>{{$proposal->client->name}}</td>
                        </tr>
                    @empty
                        <p>{{trans('site.no_records')}}</p>
                    @endforelse
                @endif

                </tbody>

            </table>
            <div class="m-3">
                @if($proposals)
                    {{ $proposals->links() }}
                @endif
            </div>

        </div>

    </div>
</div>
