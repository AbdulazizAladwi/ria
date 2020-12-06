<?php

namespace App\Http\Livewire\Costing;

use Livewire\Component;
use App\Models\TotalCost;
use App\Models\Proposal;
use App\Models\Opportunity;
use App\Models\Resource;
use App\Models\Cost;
use App\Models\Setting;
class EditCost extends Component
{
    public $totalcosts, $proposal, $costs, $days, $res, $total, $totalcost, $price;
    public function render()
    {
        $this->totalcosts = TotalCost::all();
        $this->costs = Cost::all();
        $this->days = Setting::all()->first();
        return view('livewire.costing.edit-cost');
    }
}
