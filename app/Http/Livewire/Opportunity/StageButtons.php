<?php

namespace App\Http\Livewire\Opportunity;

use Livewire\Component;

class StageButtons extends Component
{

    public $opportunity,$stageNumber;

    public $activeStatus;


    public $showStopBtn;

    protected $listeners = [
        'stageClicked',
        'statusClicked',
        'stopClicked'
    ];


    public function mount($opportunity,$stageNumber)
    {
        $this->opportunity = $opportunity;
        $this->stageNumber = $stageNumber;
        $this->activeStatus = $opportunity->status;
        $opportunity->isNotQualified() ? $this->showStopBtn = false : $this->showStopBtn = true;
    }


    public function stageClicked($stage)
    {
        $this->stageNumber = $stage;
    }

    public function statusClicked($status)
    {
        $this->activeStatus = $status;
        $this->emit('statusChanged');
    }

    public function stopClicked($stage)
    {
        $this->showStopBtn = false;
    }


    public function render()
    {
        return view('livewire.opportunity.stage-buttons');
    }
}
