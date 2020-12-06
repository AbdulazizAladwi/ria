<?php

namespace App\Http\Livewire\Report;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Livewire\Component;

class OpportunityReport extends Component
{
    public $from,$to,$stage,$status,$client;

    public $stages,$statusChoices,$clients;


    protected $queryString = [
        'from',
        'to',
        'stage',
        'status',
        'client'
    ];

    public function mount(OpportunityRepositoryInterface $opportunityRepository,ClientRepositoryInterface $clientRepository)
    {
        $this->stages = $opportunityRepository->stages();
        $this->clients = $clientRepository->clientChoices();

    }



    public function getStatusByStage(OpportunityRepositoryInterface $opportunityRepository)
    {
        empty($this->stage) ? $this->statusChoices = [] : $this->statusChoices = $opportunityRepository->statusByStage($this->stage);

    }

    public function fromSelected()
    {
        $this->to = now()->toDateString();
    }
    public function render(OpportunityRepositoryInterface $opportunityRepository)
    {
        return view('livewire.report.opportunity-report',[

            'opportunities' => $opportunityRepository->opportunityReport($this->from,$this->to,$this->stage,$this->status,$this->client)

        ]);
    }
}
