<div>
    <div class="col-sm-10 mx-auto">
        <div class="card">
            <div class="card-header">@lang('site.main_info')</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang('site.opportunity_name')</label>
                        <h5>{{ $opportunity->name }}</h5>
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang('site.client')</label>
                        <h5>{{ $opportunity->client->name }}</h5>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang('site.contact')</label>
                        <h5>{{ $opportunity->contact->name }}</h5>
                    </div>

                    <div class="form-group col-md-6">
                        <label>@lang('site.current_stage')</label>
                        <h5>{{ $opportunity->stageString() }}</h5>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang('site.current_status')</label>
                        <h5>
                            @if ( $opportunity->hasStatus() )
                                {{ $opportunity->statusString() }}
                            @else
                                @lang('site.no_status')
                            @endif
                        </h5>
                    </div>

                </div>

                <div class="form-group">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ $stagesActive[1] ? 'active' : '' }}" wire:click.prevent="$emit('stageClicked',1)" href="#">@lang('site.client_prospect')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ !$stagesEnabled[2] ? 'disabled' :'' }} {{ $stagesActive[2] ? 'active' : '' }}" wire:click.prevent="$emit('stageClicked',2)"  href="#">@lang('site.qualification')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ !$stagesEnabled[3] ? 'disabled' :'' }} {{ $stagesActive[3] ? 'active' : '' }}" wire:click.prevent="$emit('stageClicked',3)" href="#">@lang('site.pre-sales')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ !$stagesEnabled[4] ? 'disabled' :'' }} {{ $stagesActive[4] ? 'active' : '' }}" wire:click.prevent="$emit('stageClicked',4)" href="#">
                               @lang('site.feedback')
                            </a>
                        </li>
                    </ul>

                    <div class="tabs-content p-4 m-3">

                            @if($isPreSales)
                                @livewire('opportunity.actions-table',['stageNumber' => $clickedStage,'opportunityId' => $opportunity->id ])
                            @else
                                @livewire('opportunity.requirements.table', ['opportunityId' => $opportunity->id,'stageNumber' => $clickedStage])
                            @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('js')
    <script>

        Livewire.on('prepareDelete', ()=>{
            $('#deleteRequirement').modal('show');
        })


        Livewire.on('requirementDeleted', ()=>{
            $('#deleteRequirement').modal('hide');
            toastr.success("{!! trans('site.deleted_successfully') !!}")

        })

        Livewire.on('requirementAdded', ()=>{
            $('#addRequirement').modal('hide');
            toastr.success(" {!! trans('site.added_successfully') !!}");
        });
    </script>
@endpush
