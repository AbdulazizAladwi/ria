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
            <!--Add button-->
            <div class="col-md-4">
                <label>@lang('site.select_stage')</label>
                <select wire:model.lazy="stage" class="form-control" wire:change="getStatusByStage">
                    <option value="">@lang('site.select_stage')</option>
                    @foreach( $stages as $key => $value )

                        <option value="{{ $key }}">{{ $value }}</option>

                    @endforeach
                </select>

            </div>






                <div class="col-md-4 mx-auto">
                    <label>@lang('site.select_status')</label>

                    <select wire:model.lazy="status" class="form-control">


                        <option value="">@lang('site.select_status')</option>

                        @if ( $statusChoices )
                            @foreach( $statusChoices as $key => $value )

                                <option value="{{ $key }}">{{ $value }}</option>

                            @endforeach
                        @endif

                    </select>
                </div>






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
        <div class="card-header">@lang('site.opportunity-report')</div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>@lang('site.opportunity_name')</th>
                    <th>@lang('site.client')</th>
                    <th>@lang('site.contact')</th>
                    <th>@lang('site.stage')</th>
                    <th>@lang('site.status')</th>
                </tr>
                </thead>
                <tbody>
                @if ( !is_null($opportunities) )
                @forelse ( $opportunities as $opportunity )
                    <tr>

                        <td>{{ $opportunity->name }}</td>
                        <td>{{ $opportunity->client->name }}</td>
                        <td>{{ $opportunity->contact->name ?? "-" }}</td>
                        <td>{{ $opportunity->stageString() }}</td>
                        <td>{{ $opportunity->statusString() }}</td>

                    </tr>

                @empty

                    <p>@lang('site.no_records')</p>

                @endforelse
                    @endif
                </tbody>

                <div class="m-3">
                    @if ( !is_null($opportunities) )

                    {!! $opportunities->links() !!}
                        @endif
                </div>



            </table>
        </div>
    </div>
</div>






