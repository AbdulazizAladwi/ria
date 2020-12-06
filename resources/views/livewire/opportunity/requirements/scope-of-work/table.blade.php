<div>
    <div class="row">
        @if(count($scopeOfWorks) == 0)
            <div class="col-md-6">
                <a href="{{route('dashboard.scope-of-works.create', $requirement->id)}}" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        @endif
    </div>


    <div class="card">
        <div class="card-header">@lang('site.scope_of_works')</div>
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
                @forelse( $scopeOfWorks as $index => $sow )
                    <tr>
                        <td> @lang('site.version')  {{$index + 1 }}</td>
                        <td>{{$sow->date}}</td>
                        <td>
                            <a href="{{ route('dashboard.scope-of-works.show', ['requirement_id' => $requirement->id, 'sow_id' => $sow->id] )}}" class="btn"><i class="icon-eye"></i></a>
                            @if(!$opportunity->stageIsOver(3))
                                <a href="{{ route('dashboard.scope-of-works.edit', ['requirement_id' => $requirement->id, 'sow_id' => $sow->id] )}}" class="btn"><i class="icon-edit2"></i></a>
                            @endif
                            <a class="btn" target="_blank" href="{{route('dashboard.pdf.sow',$sow->id)}}"><i class="icon-print2"></i></a>

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
                {{ $scopeOfWorks->links() }}
            </div>

        </div>
    </div>
</div>
