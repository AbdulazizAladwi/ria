<?php

namespace App\Http\Livewire\Opportunity;

use App\Models\Action;
use App\Models\ChangeStage;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Livewire\Component;

class ShowCopy extends Component
{

    public $opportunity;

    public $currentStage = 1;

    public $activeStage = 1;

    public $notQualified = 2;

    public $stageStatus;


    public $stagesEnabled = [


        2 => false,
        3 => false,
        4 => false,

    ];





    public $eventsAvailableIn = [

        2 => false,
        3 => false,
        4 => false
    ];

    protected $listeners = [
        'stageClicked',
        'nextClicked',
        'stopClicked',
        'statusClicked',
    ];

    public function mount($opportunity)
    {


        $this->opportunity = $opportunity;
        $this->falsePrevStages($opportunity->stage);
        $this->activeStage  = $opportunity->isWon() ? 5 : $opportunity->stage;
        $this->currentStage = $opportunity->stage;
        $this->stageStatus = $opportunity->hasLastStatus() ? $opportunity->statusString() : trans('site.pending');

    }


    public function stageClicked($stage)
    {

            $this->activeStage  = $stage;
            $this->currentStage = $stage;

            if ( $stage == 4 and $this->opportunity->hasLastStatus() )
            {
                $this->stageStatus = $this->opportunity->statusString();
                return;
            }

            if ( $this->opportunity->stage == $stage )
            {
                $this->stageStatus = $this->opportunity->isNotQualified() ? trans('site.not_qualified')  : trans('site.pending');

            } else {

                $this->stageStatus = trans('site.qualified');
            }

    }


    public function nextClicked($stage,OpportunityRepositoryInterface $opportunityRepository)
    {
        $nextStage = $stage + 1;


        if ( $this->opportunity->changed($stage,$nextStage) )
        {
            return $this->redirect(route('dashboard.opportunities.show',$this->opportunity->id));
        }


        $opportunityRepository->update($this->opportunity,[
            'stage' => $nextStage,
            'status'=> null
        ]);


        $this->opportunity->stageSteps()->create([

            'from_stage' => $stage,
            'to_stage'   => $nextStage

        ]);


        $this->stagesEnabled[$nextStage] = true;
        $this->activeStage = $this->opportunity->stage;
        $this->currentStage = $this->opportunity->stage;


        return $this->redirect($this->opportunity->id);




    }

    public function stopClicked($stage,OpportunityRepositoryInterface $opportunityRepository)
    {
        if ( $this->opportunity->isNotQualified() )
        {
            $this->redirect(route('dashboard.opportunities.show',$this->opportunity->id));
        }



        $opportunityRepository->update($this->opportunity,[
           'status' => $this->notQualified
        ]);

        $this->stageStatus = $this->opportunity->statusString();

    }

    public function statusClicked($status,OpportunityRepositoryInterface $opportunityRepository)
    {
        $opportunityRepository->update($this->opportunity,[
            'status' => $status
        ]);

        $this->stageStatus = $this->opportunity->statusString();

        if ( $this->opportunity->isWon() )
        {
            $this->redirect(route('dashboard.opportunities.show',$this->opportunity->id));
        }

    }



    protected function falsePrevStages($number)
    {
        $stageOne = 1;
        for ( $i=$number; $i> $stageOne;$i-- )
        {
            $this->stagesEnabled[$i] = true;
        }
    }


    public function render()
    {
        return view('livewire.opportunity.show-copy');
    }
}
