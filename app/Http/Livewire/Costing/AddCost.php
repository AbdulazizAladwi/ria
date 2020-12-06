<?php

namespace App\Http\Livewire\Costing;

use Livewire\Component;
use App\Models\Proposal;
use App\Models\Opportunity;
use App\Models\Resource;
use App\Models\Cost;
use App\Models\Setting;
use App\Models\TotalCost;
class AddCost extends Component
{
    public $proposal, $costs, $days, $res, $total;
    public function render()
    {
        //$this->proposal = Proposal::all();
        //$this->resources = Resource::all();
        $this->costs = Cost::all();
        $this->days = Setting::all()->first();
        return view('livewire.costing.add-cost');
    }
}
