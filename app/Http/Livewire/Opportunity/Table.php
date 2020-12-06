<?php

namespace App\Http\Livewire\Opportunity;

use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;

    public $search = '';
    public $status;
    public $filterStages, $filterStatusByStage, $filterStageId;
    public $opportunity, $getStatusByStage;
    public $deleteID;
    public $modalStatus;
    public $modalStageId;
    public $modalStatusId;
    public $name, $updateId;

    protected $paginationTheme = 'bootstrap';


    protected $listeners = [
        'prepareDelete'   => 'prepareDelete',
        'prepareEdit'     => 'prepareEdit',
    ];

    public function prepareDelete($id){

        $this->deleteID = $id;
    }

    public function prepareEdit($id, OpportunityRepositoryInterface $opportunityRepository)
    {
       $this->updateId = $id;
       $opportunity = $opportunityRepository->find($this->updateId);
       $this->name = $opportunity->name;

    }

    public function updateOpportunityName(OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->validate(['name' => 'required|max:100|unique:opportunities,name,'.$this->updateId]);
        $opportunity = $opportunityRepository->find($this->updateId);
        $opportunity->update(['name' => $this->name]);
        $this->emit('opportunityNameUpdated');
    }

    public function delete(OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->emit('deleted_Successfully');
        $opportunityRepository->delete($this->deleteID);

    }

    public function mount(OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->filterStages = $opportunityRepository->stages();
    }

    public function getFilterStatus(OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->filterStatusByStage = $opportunityRepository->getStatusByStage($this->filterStageId);
    }

    public function getOpportunityId($id, OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->opportunity = $opportunityRepository->find($id);
        $stage = $this->opportunity['stage'];
        $status = $this->opportunity['status'];
        $this->modalStatus = $opportunityRepository->getStatusByStage($stage);
        $this->modalStageId = $stage;
        $this->modalStatusId = $status;

    }

    public function getModalStatusByStage(OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->modalStatus = $opportunityRepository->getStatusByStage($this->modalStageId);
        $this->resetValidation();
    }


    public function changeStatus($opportunity, OpportunityRepositoryInterface $opportunityRepository)
    {

        $opp = $opportunityRepository->find($opportunity['id']);
        $validatedData = $this->validate([
            'modalStageId' => 'required',
            'modalStatusId' => "required_if:modalStageId,==,2,4"
        ]);


        if ($this->modalStageId == '1' ||$this->modalStageId == '3')
            $this->modalStatusId = null;

        $opp->update([
            'stage' => $this->modalStageId,
            'status' => $this->modalStatusId,
        ]);

        $this->emit('updatedSuccessfully');

    }




    public function render(OpportunityRepositoryInterface $opportunityRepository)
    {

        return view('livewire.opportunity.table', [
            'opportunities' => $opportunityRepository->search($this->search, $this->filterStageId, $this->status)
        ]);
    }



}
