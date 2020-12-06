<?php

namespace App\Http\Livewire\Client;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $type;
    public $deleteId;
    public $ClientTypes;

    protected $listeners = ['prepareDelete' => 'prepareDelete'];

    public function mount(ClientTypeRepositoryInterface $clientTypeRepo){
        $this->ClientTypes = $clientTypeRepo->all();
    }

    public function prepareDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete(ClientRepositoryInterface $clientRepository)
    {
        $clientRepository->delete($this->deleteId);
        $this->emit('ClientDeleted');

    }



    public function render(ClientRepositoryInterface $clientRepo)
    {
        return view('livewire.client.table', [
            'clients' => $clientRepo->search($this->search, $this->type),

        ]);
    }
}
