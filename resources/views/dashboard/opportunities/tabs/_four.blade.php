<div class="tab-pane {{ $activeStage == 4 ? 'fade active show' : '' }}" id="four" role="tabpanel" aria-labelledby="last-tab" aria-expanded="false">






    @if ( $currentStage == 4 )

    @livewire('opportunity.actions-table',['stageNumber' => 4 ,'opportunity' => $opportunity])

        <div class="container">

                <div style="text-align: right">

                    @livewire('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])

                </div>





        </div>

    @endif


</div>


