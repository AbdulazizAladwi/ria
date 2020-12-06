<?php

namespace App\Http\Livewire\ClientType;

use App\Models\ClientType;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $name;
    public $search = "";
    public $update = false;
    public $deleteID = null;
    public $updateID = null;




    protected $paginationTheme = 'bootstrap';


    protected $listeners = [
        'updateModal'   => 'prepareUpdate',
        'deletionConfirm' => 'prepareDelete',
    ];


    private function resetInput()
    {
        $this->name = null;
    }

    public function prepareAdd(){

        $this->update = false;
        $this->resetInput();
        $this->resetValidation();
    }



    public function store(ClientTypeRepositoryInterface $client)
    {

        $validatedData = $this->validate([
            'name'           => ['required','min:3','max:30',Rule::unique('client_types')->whereNull('deleted_at')],
        ]);

        $client->create($validatedData);
        $this->resetInput();
        $this->emit('ClientTypeAdded');

    }

    public function prepareUpdate($id, ClientTypeRepositoryInterface $client){
        $this->resetInput();
        $this->resetValidation();
        $this->update = true;
        $this->updateID = $id;
        $record = $client->find($id);
        $this->name = $record->name;

    }

    public function update(ClientTypeRepositoryInterface $client){

        $validatedData = $this->validate([
            'name'  => ['required', 'min:3', 'max:30', Rule::unique('client_types')->ignore($this->updateID)
            ->whereNull('deleted_at')]

        ]);

        $record = $client->find($this->updateID);
        $record->update($validatedData);
        $this->emit('ClientTypeUpdated');
    }

    public function prepareDelete($id)
    {
        $this->deleteID = $id;
    }


    public function delete(ClientTypeRepositoryInterface $client)
    {
        $this->emit('DeleteClientType', $this->deleteID);
        $client->delete($this->deleteID);

    }

    public function render(ClientTypeRepositoryInterface $client)
    {
        return view('livewire.client-type.table', [
            'types' => $client->search($this->search)
        ]);
    }

}
