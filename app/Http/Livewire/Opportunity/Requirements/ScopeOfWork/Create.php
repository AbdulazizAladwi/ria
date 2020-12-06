<?php

namespace App\Http\Livewire\Opportunity\Requirements\ScopeOfWork;

use App\Models\Deliverable;
use App\Models\ScopeOfWork;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\Technology;
use Livewire\Component;

class Create extends Component
{
    public $title, $requirementId, $opportunity, $client, $deliverables, $technologies, $resources, $estimation_types;
    public $fields= [];
    public $features, $deliverablesContent, $technologiesContent;
    public $resourceSection = [
        ['resource' => '', 'estimation_type' => '', 'estimation' => '']
    ];


    public function validateDate()
    {
        $this->validate([
            'features'               => 'required',
            'fields.date'            => 'required',
            'deliverablesContent'    => 'required',
            'technologiesContent'    => 'required',
            'resourceSection.*.resource'    => 'required',
            'resourceSection.*.estimation_type'    => 'required',
            'resourceSection.*.estimation'    => 'required',
        ]);

    }


    public function mount()
    {
        $this->deliverables = Deliverable::deliverables();
        $this->technologies = Technology::technologies();
        $this->resources = Resource::all();
        $this->estimation_types = Resource::estimation_types();
        $this->title = @trans('site.create_sow');

    }


    public function repeatResourceSection()
    {

        $this->resourceSection[] =  ['resource' => '', 'estimation_type' => '', 'estimation' => ''];
    }

    public function minusResourceSection($index)
    {
        unset($this->resourceSection[$index]);
        array_values($this->resourceSection);
    }

    public function resetInputs()
    {
        $this->fields = [];
        $this->resourceSection  = [['resource' => '', 'estimation_type' => '', 'estimation' => '']];

    }


    public function store()
    {

        $this->validateDate();
        $requirement = Requirement::findOrFail($this->requirementId);
        $client = $requirement->opportunity->client;
        $sow = ScopeOfWork::create([
            'client_id'         => $client['id'],
            'requirement_id'    => $this->requirementId,
            'features'          => $this->features,
            'date'              => $this->fields['date'],
            'technologies'      => $this->technologiesContent,
            'deliverables'      => $this->deliverablesContent,
        ]);

        foreach ($this->resourceSection as $index=>$resource)
        {
            $sow->resources()->attach($resource['resource'], [
                'estimation_type' => $resource['estimation_type'],
                'estimation'      => $resource['estimation'],
            ]);
        }

        $this->emit('proposalAdded');
        toastSuccess(trans('site.added_successfully'));
        return redirect()->route('dashboard.scope-of-works.index', ['requirement_id' => $this->requirementId, 'opportunity_id' => $this->opportunity->id]);


    }

    public function resetAllInputs()
    {
        $this->resetInputs();
        $this->emit('resetInputs');
        $this->resetValidation();

    }


    public function render()
    {

        return view('livewire.opportunity.requirements.scope-of-work.create');
    }
}
