<?php

namespace App\Http\Livewire\Opportunity\Requirements\Wireframe;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination,WithFileUploads;
    public $opportunity,$requirement,$description,$wireframeFile;
    public $wireframe; // for update

    public $update = false;
    public $showFileInput = false;


    protected $listeners = [


        'prepareCreate',
        'prepareUpdate'

    ];

    protected $paginationTheme = 'bootstrap';

    public function prepareCreate()
    {
        $this->update = false;
        $this->showFileInput = true;
        $this->resetErrorBag();
        $this->resetInputs();

    }

    public function prepareUpdate($id)
    {
        $this->update = true;
        $this->showFileInput = true;
        $this->wireframe = $this->opportunity->wireframes()->find($id);
        $this->description = $this->wireframe->description;
    }

    public function addWireframe()
    {
        $data = $this->validate([

            'description' => [
                'required','max:100',
                Rule::unique('wireframes')
                    ->where('requirement_id',$this->requirement->id)
                    ->whereNull('deleted_at')
            ],
            'wireframeFile'        =>  "required|file|mimes:jpg,png,jpeg,pdf,docx,doc,psd",
        ]);
        $data['file'] = $this->wireframeFile->storeAs('wireframes',$data['description'].'-wireframe','public');
        $data['requirement_id'] = $this->requirement->id;
        $this->opportunity->wireframes()->create($data);
        $this->showFileInput = false;
        $this->emit('wireframeAdded');

    }


    public function resetInputs()
    {
        $this->reset(['description','wireframeFile']);
    }


    protected function validatedRules()
    {
        $rules = [

            'description' => [
                'required','max:100',
                Rule::unique('wireframes')
                    ->where('requirement_id',$this->requirement->id)
                    ->whereNull('deleted_at')
            ],
            'file'        =>  "required|file",
        ];
        return $rules;
    }


    public function mount($opportunity,$requirement)
    {
        $this->opportunity = $opportunity;
        $this->requirement = $requirement;
    }
    public function render()
    {
        return view('livewire.opportunity.requirements.wireframe.table',[

            'wireframes'        => $this->opportunity->wireframes()->latest()->paginate(5),
            'isEmptyWireframes' => $this->opportunity->wireframes()->count() === 0,

        ]);
    }
}
