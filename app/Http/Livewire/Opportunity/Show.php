<?php

namespace App\Http\Livewire\Opportunity;

use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination,AuthorizesRequests;

    public $opportunity,$stages,$status,$stage,$selectedStatus,$clickedStage;

    public $notQualified = 2;
    public $won          = 3;
    public $lost         = 4;
    public $hold         = 5;
    public $canceled     = 6;



    public $isPreSales;



    protected $listeners = [
        'stageClicked'  => 'stageClicked',
        'toNextStage'   => 'updateToNextStage',
        'stageDisabled' => 'disableOpportunity',
        'isWon'      => 'isWon',
        'isHold'     => 'isHold' ,
        'isLost'     => 'isLost',
        'isCanceled' => 'isCanceled',
    ];

    public $stagesEnabled = [

        2 => false,
        3 => false,
        4 => false,

    ];

    public $stagesActive = [
        1 => false,
        2 => false,
        3 => false,
        4 => false,

    ];

    public function mount($opportunity,OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->opportunity     = $opportunity;
        $this->stages          = $this->nextStageChoice($opportunityRepository->stages(),$opportunity->stage);
        $this->status          = $opportunityRepository->statusByStage($opportunity->stage);
        $this->stage           = $this->opportunity->stage;
        $this->selectedStatus  = $opportunity->status;
        $this->stagesActive[$opportunity->stage] = true;
        $this->clickedStage = $opportunity->stage;
        $this->falsePrevStages($opportunity->stage);
        if ($this->opportunity->stage == 3)
        {

            $this->isPreSales = false;
        }

        else
        {

            $this->isPreSales = true;
        }

    }





    public function stageClicked($stageNumber)
    {

        if ( $stageNumber > $this->opportunity->stage )
        {
            abort(403);
        }

        $this->falseAllActive();

        $this->stagesActive[$stageNumber] = true;

        $this->clickedStage = $stageNumber;

        if ($stageNumber == 3)
        {

            $this->isPreSales = false;
        }

        else
        {

            $this->isPreSales = true;
        }

    }

    public function updateToNextStage($stageNumber)
    {


        $this->opportunity->update([
            'stage' => $stageNumber,
            'status'=> null
        ]);


        $this->opportunity->timeChanges()->create([
           'from_stage' => $stageNumber - 1,
            'to_stage'  => $stageNumber,
        ]);


        $this->stagesEnabled[$stageNumber] = true;


    }

    public function disableOpportunity($stageNumber)
    {
        $this->opportunity->update([
            'status' => $this->notQualified,
        ]);
    }

    public function isWon()
    {
        $this->opportunity->update([
            'status' => $this->won
        ]);
    }

    public function isHold()
    {
        $this->opportunity->update([
            'status' => $this->hold
        ]);
    }

    public function isLost()
    {
        $this->opportunity->update([
            'status' => $this->lost
        ]);
    }

    public function isCanceled()
    {
        $this->opportunity->update([
            'status' => $this->canceled
        ]);
    }

    protected function falseAllActive()
    {
        foreach ( $this->stagesActive as $key => $value )
        {
            $this->stagesActive[$key] = false;
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

    protected function nextStageChoice($stages,$from)
    {
        return array_slice($stages,$from - 1,2,true);
    }
    public function render(OpportunityRepositoryInterface $opportunityRepository)
    {
        return view('livewire.opportunity.show',[

            'opportunity' => $opportunityRepository->find($this->opportunity->id),

        ]);
    }
}
