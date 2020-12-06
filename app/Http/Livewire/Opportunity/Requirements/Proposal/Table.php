<?php

namespace App\Http\Livewire\Opportunity\Requirements\Proposal;

use App\Models\Proposal;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $opportunity, $requirement;

    public function render()
    {

        return view('livewire.opportunity.requirements.proposal.table', [
            'proposals' => Proposal::whereRequirementId($this->requirement['id'])->paginate()
        ]);
    }
}
