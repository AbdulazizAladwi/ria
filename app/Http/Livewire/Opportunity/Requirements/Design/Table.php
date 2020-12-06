<?php

namespace App\Http\Livewire\Opportunity\Requirements\Design;

use App\Models\Design;
use App\Models\Requirement;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, WithFileUploads;

    public $opportunityId, $requirementId, $opportunity;
    public $description, $design_file;
    public $updateId, $deleteId;
    public $isUpdate;
    public $test;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['prepareUpdate' => 'prepareUpdate'];

    public function prepareAdd()
    {
       $this->resetInputs();
    }


    public function prepareUpdate($id)
    {
        $this->isUpdate = true;
        $design = Design::findOrFail($id);
        $this->description = $design->description;
        $this->updateId = $id;
    }

    public function resetInputs()
    {
        $this->reset(['description']);
    }

    public function store()
    {
         $this->validate([
            'description' => [
                'required',
                'min:2',
                Rule::unique('designes')->where('requirement_id', $this->requirementId)
                    ->whereNull('deleted_at')],
            'design_file'        => 'required|file|mimes:jpg,jpeg,png,pdf,docx, psd',
        ]);


        $fileName = $this->design_file->store('designs', 'public');

        Design::create([
            'requirement_id'   => $this->requirementId,
            'description'      => $this->description,
            'file'             => $fileName
        ]);

        $this->emit('DesignAdded');
        $this->resetInputs();

    }

    public function render()
    {
        return view('livewire.opportunity.requirements.design.table', [
            'designs' => Design::whereRequirementId($this->requirementId)->paginate(5)
        ]);
    }
}
