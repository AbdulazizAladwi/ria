<div  class="tab-pane {{ $activeStage == 2 ? 'fade active show' : '' }} p-3" id="two" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">




        @if ( $currentStage == 2 )

            @livewire('opportunity.actions-table',['stageNumber' => $currentStage  , 'opportunity' => $opportunity])
        <div class="container">



            @if ( $opportunity->stage == 2  )

                <div style="text-align: right">

                    @livewire('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])

                </div>

            @endif



        </div>
        @endif



</div>


