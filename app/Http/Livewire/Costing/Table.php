<?php

namespace App\Http\Livewire\Costing;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proposal;
use App\Models\Opportunity;
use App\Models\Cost;
use App\Models\TotalCost;

class Table extends Component
{
    protected $listeners = [
        'deletionConfirm' => 'prepareDelete',
    ];
    protected $paginationTheme = 'bootstrap';
    public  $opportunities, $name, $record;
    public $deleteID = null;
    use WithPagination;
    public $searchTerm;
    
    public function render()
    {
       $searchTerm = '%'.$this->searchTerm.'%';
        $query  = Proposal::first()->with('requirement.opportunity','requirement');

        if ( !is_null($this->searchTerm) and !empty($this->searchTerm) )
        {
            $searchTerm = $this->searchTerm;
            $query = $query->whereHas('requirement',function($q) use($searchTerm){
                $q->whereHas('opportunity',function($query)use($searchTerm){
                    $query->where('name','like','%'.$searchTerm.'%');
                });
            });  

        }
        return view('livewire.costing.table',[
            'details' => $query->paginate()
 ]);
        //return view('livewire.costing.table');
        
    }

    public function prepareDelete($id)
    {
        $this->deleteID = $id;
    }
    public function delete(Proposal $record)
    {
        $record = TotalCost::find($this->deleteID);
        $record->delete($this->deleteID);
        $this->emit('userdelete', $this->deleteID);
    }
}
