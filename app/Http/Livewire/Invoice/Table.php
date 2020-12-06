<?php

namespace App\Http\Livewire\Invoice;

use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Livewire\Component;

class Table extends Component
{
    public $search;

    public function render(OpportunityRepositoryInterface $opportunityRepository)
    {
        return view('livewire.invoice.table', [
            'opportunities' => $opportunityRepository->wonOpportunities($this->search)
        ]);
    }
}
