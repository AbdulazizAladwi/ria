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

                    @if ( $opportunity->hasContact() )
                        <div class="form-group col-md-6">
                            <label>@lang('site.contact')</label>
                            <h5>{{ $opportunity->contact->name }}</h5>
                        </div>
                    @endif

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
                                @lang('site.pending')
                            @endif
                        </h5>
                    </div>




                    <div class="form-group col-md-6">
                        <label>@lang('site.stage_status')</label>
                        <h5>
                            {{ $stageStatus }}
                        </h5>
                    </div>


                </div>



                    <ul class="nav nav-tabs" id="myTab" role="tablist">


                        <li class="nav-item" wire:click.prevent="$emit('stageClicked',1)">
                            <a class="nav-link {{ $activeStage == 1 ? 'active' : '' }}" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true" aria-expanded="true">
                                @lang('site.prospect')
                            </a>
                        </li>



                        @if ( $stagesEnabled[2] )
                        <li class="nav-item" wire:click.prevent="$emit('stageClicked',2)">
                            <a class="nav-link {{ $activeStage == 2 ? 'active' : '' }} {{ !$stagesEnabled[2] ? 'disabled' :'' }}" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false" aria-expanded="false">
                                @lang('site.qualification')
                            </a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ $activeStage == 2 ? 'active' : '' }} {{ !$stagesEnabled[2] ? 'disabled' :'' }}" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false" aria-expanded="false">
                                    @lang('site.qualification')
                                </a>
                            </li>
                        @endif

                        @if ( $stagesEnabled[3] )
                            <li class="nav-item" wire:click.prevent="$emit('stageClicked',3)">
                                <a class="nav-link {{ $activeStage == 3 ? 'active' : '' }} {{ !$stagesEnabled[3] ? 'disabled' :'' }}" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false" aria-expanded="false">
                                    @lang('site.pre-sales')
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ $activeStage == 3 ? 'active' : '' }} {{ !$stagesEnabled[3] ? 'disabled' :'' }}" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false" aria-expanded="false">
                                    @lang('site.pre-sales')
                                </a>
                            </li>
                        @endif



                        @if ( $stagesEnabled[4] )

                            <li class="nav-item" wire:click.prevent="$emit('stageClicked',4)">
                                <a class="nav-link {{ $activeStage == 4 ? 'active' : '' }} {{ !$stagesEnabled[4] ? 'disabled' :'' }}" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">
                                    @lang('site.feedback')
                                </a>
                            </li>

                        @else

                            <li class="nav-item">
                                <a class="nav-link {{ $activeStage == 4 ? 'active' : '' }} {{ !$stagesEnabled[4] ? 'disabled' :'' }}" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">
                                    @lang('site.feedback')
                                </a>
                            </li>

                        @endif


                        @if ( $opportunity->isWon() )


                        <li class="nav-item" wire:click.prevent="$emit('paymentClicked')">
                                <a class="nav-link {{ $activeStage == 5 ? 'active' : '' }} {{ !$stagesEnabled[4] ? 'disabled' :'' }}" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false" aria-expanded="false">
                                    @lang('site.payment_terms')
                                </a>
                        </li>

                        @endif


                    </ul>
                    <div class="tab-content" id="myTabContent">

                        @include('dashboard.opportunities.tabs._one')
                        @include('dashboard.opportunities.tabs._two')
                        @include('dashboard.opportunities.tabs._three')
                        @include('dashboard.opportunities.tabs._four')

                        @if ( $opportunity->isWon() )

                          @include('dashboard.opportunities.tabs._five')

                        @endif

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
