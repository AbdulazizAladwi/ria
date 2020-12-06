<?php

namespace App\Http\Livewire\Cost;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Cost;

class Table extends Component
{
    protected $listeners = [
        'deletionConfirm' => 'prepareDelete',
    ];
    protected $paginationTheme = 'bootstrap';
    public $name, $cost, $selected_id, $typeCreate;
    public $type = '';
    public $deleteID = null;
    public $updateMode = false;
    use WithPagination;
    public $searchTerm = '';
    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        $query  = Cost::latest();
        if ( !is_null($this->searchTerm) and !empty($this->searchTerm))
        {
            $query = $query->where('name','like',$searchTerm);
        }
        if ( !is_null($this->type) and !empty($this->type) )
        {
            $query = $query->where('type', $this->type);
        }
        return view('livewire.cost.table',[
            'data' => $query->paginate()
 ]);

    }
    public function resetInput()
    {
        $this->name = null;
        $this->cost = null;
        $this->typeCreate = null;
        $this->resetValidation();
    }
    public function store()
    {
        $validation = $this->validate([
            'name' => 'required|unique:costs',
            'cost' => 'required',
            'typeCreate' => 'required'
        ]);
        Cost::create([
            'name' => $this->name,
            'cost' => $this->cost,
            'type' => $this->typeCreate,        
        ]);
        //$this->updateMode = false;
        $this->resetInput();
        $this->emit('useradd');
    }
    public function edit($id)
    {
        $this->resetValidation();
        $this->updateMode = true;
        $record = Cost::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->cost = $record->cost;
        $this->typeCreate = $record->type;
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInput();
    }
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => ['required','min:3','max:100',Rule::unique('costs')->whereNull('deleted_at')->ignore($this->selected_id)],
            'cost' => 'required',
            'typeCreate' => 'required'
        ]);
        if ($this->selected_id) {
            $record = Cost::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'cost' => $this->cost,
                'type' => $this->typeCreate,           
            ]);  
            $this->resetInput();
            $this->updateMode = false;$this->emit('userupdate');
        }
    }
    /*public function destroy($id)
    {
        if ($id) {
            $record = Cost::where('id', $id);
            $record->delete();
            session()->flash('message', 'Data Deleted Successfully.');
        }
    }*/

    public function prepareDelete($id)
    {
        $this->deleteID = $id;
    }


    public function delete(Cost $record)
    {
        if ($this->deleteID) {
        $record = Cost::find($this->deleteID);
        //dd($record);
        $this->emit('userdelete', $this->deleteID);
        $record->delete($this->deleteID);
        }

    }
}
