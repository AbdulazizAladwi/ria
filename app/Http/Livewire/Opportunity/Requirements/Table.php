<?php

namespace App\Http\Livewire\Opportunity\Requirements;

use App\Models\Requirement;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $getRequirements;
    public $type, $deadline;
    public $stageIsOver;
    public $deleteId;



    public $opportunity,$stageNumber;





    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'prepareAdd'    => 'prepareAdd',
        'prepareDelete',
        'stageClicked',
    ];





    public function mount($opportunity,$stageNumber)
    {
        $this->getRequirements = Requirement::getRequirements();
        $this->opportunity = $opportunity;
        $this->stageNumber = $stageNumber;
        $this->stageIsOver = $opportunity->stageIsOver($stageNumber);
    }



    public function resetInputs()
    {
        $this->reset(['type', 'deadline']);
    }

    public function prepareDelete($id)
    {

        $this->deleteId = $id;

    }

    public function stageClicked($stage)
    {
            $this->stageNumber = $stage;
    }

    public function prepareAdd()
    {
        $this->resetInputs();
        $this->resetValidation();

    }



    public function addRequirement()
    {

        if ( $this->stageNumber != $this->opportunity->stage )
        {
            return $this->redirect(route('dashboard.opportunities.show',$this->opportunity->id));
        }


       $validatedData = $this->validate([
           'type' => [ 'required',Rule::unique('requirements')->whereNull('deleted_at')->where('opportunity_id',$this->opportunity->id)],
           'deadline' => 'required|after:yesterday'
       ]);


       Requirement::create(
           array_merge($validatedData, ['opportunity_id' => $this->opportunity->id])
       );

      $this->resetInputs();
      $this->emit('requirementAdded');

    }

    public function delete()
    {
        Requirement::findOrFail($this->deleteId)->delete();
        $this->emit('requirementDeleted');

    }



    public function render()
    {
        return view('livewire.opportunity.requirements.table', [
            'requirements' => Requirement::where('opportunity_id', $this->opportunity->id)->get()
        ]);
    }
}
