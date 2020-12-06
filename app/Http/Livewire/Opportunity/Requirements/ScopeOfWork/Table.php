<?php

namespace App\Http\Livewire\Opportunity\Requirements\ScopeOfWork;

use App\Models\ScopeOfWork;
use Livewire\Component;

class Table extends Component
{
    public $opportunity, $requirement;

    public function render()
    {

        return view('livewire.opportunity.requirements.scope-of-work.table', [

            'scopeOfWorks' => ScopeOfWork::whereRequirementId($this->requirement['id'])->paginate()

        ]);
    }
}
