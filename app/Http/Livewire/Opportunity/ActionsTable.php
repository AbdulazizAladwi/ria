<?php

namespace App\Http\Livewire\Opportunity;

use App\Repositories\Interfaces\ActionsRepositoryInterface;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ActionsTable extends Component
{
    use WithFileUploads,WithPagination;

    public $stageNumber,$opportunity;
    public $stageIsOver;
    public $description,$date_time,$actionFile,$actionDuration;
    public $hasLastStatus;

    public $showFileInput = false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'prepareCreate',
        'stageClicked',
        'statusClicked'
    ];


    protected $rules = [

        'description'    => ['required','max:500','string'],
        'actionFile'     => ['nullable','file','mimes:jpg,png,jpeg,xlsx,docx,doc,pdf'],
        'date_time'      => ['nullable','date'],
        'actionDuration'       => ['nullable','numeric','between:1,9'],

    ];

    public function mount($stageNumber,$opportunity)
    {
        $this->stageNumber   = $stageNumber;
        $this->opportunity  = $opportunity;
        $this->stageIsOver  = $opportunity->stageIsOver($stageNumber);

        $opportunity->hasLastStatus() ? $this->hasLastStatus = true : $this->hasLastStatus = false;
    }


    public function prepareCreate()
    {
        $this->showInputFile();
    }

    public function stageClicked($stage)
    {
        $this->stageNumber = $stage;
    }

    public function showInputFile()
    {
        $this->showFileInput = true;
        $this->resetErrorBag();
    }

    public function addAction(ActionsRepositoryInterface $actionsRepository)
    {

        if ( $this->stageNumber != $this->opportunity->stage )
        {
            return $this->redirect(route('dashboard.opportunities.show',$this->opportunity->id));
        }

        $data = $this->validate();

        $data['duration'] = !empty($this->actionDuration) ? $this->actionDuration : null;

        !empty($this->actionFile) ? $data['file'] = $this->actionFile->storeAs('actions', $this->actionFile->getClientOriginalName() ,'public'):'';

        $data = array_merge($data,[
            'opportunity_id' => $this->opportunity->id,
            'stage_number'   => $this->stageNumber,
        ]);



        $actionsRepository->create($data);

        $this->resetInputs();

        $this->emit('actionAdded');

        $this->showFileInput = false;

    }

    protected function resetInputs()
    {
        $this->reset(['description','date_time','actionDuration']);
    }

    public function statusClicked($status)
    {
        $this->hasLastStatus = true;
    }


    public function render(ActionsRepositoryInterface $actionsRepository)
    {
        return view('livewire.opportunity.actions-table',[

            'actions'     => $actionsRepository->actions($this->stageNumber,$this->opportunity),

        ]);
    }
}
