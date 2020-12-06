<div>
    <div class="row">
        @if(count($proposals) == 0)
            <div class="col-md-6">
                <a href="{{route('dashboard.proposals.create', $requirement->id)}}" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        @endif
    </div>


    <div class="card">
        <div class="card-header">@lang('site.proposals')</div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>@lang('site.versions')</th>
                    <th>@lang('site.date')</th>
                    <th>@lang('site.details')</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $proposals as $index=>$proposal )
                    <tr>
                        <td> @lang('site.version')  {{$index + 1 }}</td>
                        <td>{{$proposal->date->format('d M Y')}}</td>
                        <td>
                            <a href="{{ route('dashboard.proposals.show', ['requirement_id' => $requirement->id, 'proposal_id' => $proposal->id] )}}" class="btn"><i class="icon-eye"></i></a>
                            @if(!$opportunity->stageIsOver(3))
                                <a href="{{ route('dashboard.proposals.edit', ['requirement_id' => $requirement->id, 'proposal_id' => $proposal->id] )}}" class="btn"><i class="icon-edit2"></i></a>
                            @endif

                            <a href="{{route('dashboard.pdf.proposal', $proposal->id)}}" target="_blank" class="btn print"><i class="icon-print2"></i></a>

                        </td>


                    </tr>
                @empty
                    <p>@lang('site.no_records')</p>
                @endforelse
                </tbody>
            </table>


            <div class="form-group mt-3">
                <a href="{{route('dashboard.opportunities.show', $opportunity['id'])}}" class="btn btn-secondary">@lang('site.back')</a>
            </div>

            <div class="m-3">
                {{ $proposals->links() }}
            </div>

        </div>
    </div>
</div>

