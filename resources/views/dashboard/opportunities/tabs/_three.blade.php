<div class="tab-pane {{ $activeStage == 3 ? 'fade active show' : '' }}" id="three" role="tabpanel" aria-labelledby="contact-tab" aria-expanded="false">



            @if ( $currentStage == 3 )

            @livewire('opportunity.requirements.table',['stageNumber' => $currentStage , 'opportunity' => $opportunity])

                <div class="container">



                    @if ( $opportunity->stage == 3  )
                        <div style="text-align: right">
                            @livewire('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])
                        </div>


                    @endif



                </div>
            @endif



</div>
