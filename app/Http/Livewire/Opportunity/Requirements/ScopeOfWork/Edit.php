<?php


namespace App\Http\Livewire\Opportunity\Requirements\ScopeOfWork;

use App\Models\Deliverable;
use App\Models\ScopeOfWork;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\Technology;
use Livewire\Component;

class Edit extends Component
{
    public $title, $sow, $date, $discount, $requirementId, $opportunity, $client, $deliverables, $technologies, $resources, $estimation_types;
    public $fields = [];
    public $userDeliverables, $userTechnologies;
    public $features;
    public $resourceSection = [

        ['resource' => '', 'estimation_type' => '', 'estimation' => '']

    ];


    public function repeatResourceSection()
    {
        $this->resourceSection[] = ['resource' => '', 'estimation_type' => '', 'estimation' => ''];
    }


    public function minusResourceSection($index)
    {

        unset($this->resourceSection[$index]);
        array_values($this->resourceSection);
    }


    public function mount()
    {

        $this->deliverables = Deliverable::deliverables();
        $this->technologies = Technology::technologies();
        $this->estimation_types = Resource::estimation_types();
        $this->resources = Resource::all();

        $this->title = @trans('site.edit_sow');


        $this->features = $this->sow->features;
        $this->fields['date'] = $this->sow->date;

        $userDeliverablesInt = $this->sow->deliverables;
        $this->userDeliverables = $userDeliverablesInt;

        $userTechnologiesInt = $this->sow->technologies;
        $this->userTechnologies = $userTechnologiesInt;

        $this->resourceSection = $this->sow->resources->toArray();
    }


    public function validateDate()
    {
        $this->validate([
            'features' => 'required',
            'fields.date' => 'required',
            'userTechnologies' => 'required',
            'userDeliverables' => 'required',
            'resourceSection.*.id' => 'required',
            'resourceSection.*.pivot.estimation_type' => 'required',
            'resourceSection.*.pivot.estimation' => 'required',
        ]);
    }

    public function store()
    {
        $this->validateDate();
        $requirement = Requirement::findOrFail($this->requirementId);
        $client      = $requirement->opportunity->client;
        $sow         = ScopeOfWork::create([
            'client_id' => $client['id'],
            'requirement_id' => $this->requirementId,
            'features' => $this->features,
            'date' => $this->fields['date'],
            'technologies' => $this->userTechnologies,
            'deliverables' => $this->userDeliverables,
        ]);

        foreach ( $this->resourceSection as $index => $resource) {
            $sow->resources()->attach($resource['id'], [
                'estimation_type' => $resource['pivot']['estimation_type'],
                'estimation' => $resource['pivot']['estimation'],
            ]);
        }

        toastSuccess(trans('site.added_successfully'));
        return redirect()->route('dashboard.scope-of-works.index', ['requirement_id' => $this->requirementId, 'opportunity_id' => $this->opportunity->id]);


    }

    public function render()
    {
        return view('livewire.opportunity.requirements.scope-of-work.edit');
    }
}
