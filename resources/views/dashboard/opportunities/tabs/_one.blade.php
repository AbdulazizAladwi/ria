<div class="tab-pane {{ $activeStage == 1 ? 'fade active show' : '' }} p-3" id="one" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">



    @if ( $currentStage == 1 )

        @livewire('opportunity.actions-table',['stageNumber' => $currentStage ,'opportunity' => $opportunity])
        <div class="container">



            @if ( $opportunity->stage == 1 )
                <div style="text-align: right">
                    @livewire('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])
                </div>

            @endif



        </div>
    @endif

</div>






