<?php

namespace App\Http\Livewire\Report;

use App\Repositories\Interfaces\ActionsRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Livewire\Component;

class ActivityReport extends Component
{
    public $from,$to,$stage,$status,$client;

    public $stages,$statusChoices,$clients;


    protected $presales = 3;

    protected $queryString = [
        'from',
        'to',
        'stage',
        'status',
        'client'
    ];


    public function fromSelected()
    {
        $this->to = '';
    }

    public function mount(OpportunityRepositoryInterface $opportunityRepository,ClientRepositoryInterface $clientRepository)
    {
        $this->stages = $opportunityRepository->stages();
        unset($this->stages[$this->presales]);
        $this->clients = $clientRepository->clientChoices();
    }



    public function getStatusByStage(OpportunityRepositoryInterface $opportunityRepository)
    {
        empty($this->stage) ? $this->statusChoices = [] : $this->statusChoices = $opportunityRepository->statusByStage($this->stage);
    }
    public function render(ActionsRepositoryInterface $actionsRepository)
    {
        return view('livewire.report.activity-report',[
            'activities' => $actionsRepository->activityReport($this->from,$this->to,$this->stage,$this->status,$this->client),
        ]);
    }
}
