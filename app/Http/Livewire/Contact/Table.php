<?php

namespace App\Http\Livewire\Contact;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Livewire\Component;

class Table extends Component
{
    public $clientChoices,$selectedClient;
    public $search="";
    public $client;
    public $deleteId = null;


    protected $listeners = [

        'deleteRequested' => 'prepareDelete',

    ];


    public function mount(ClientRepositoryInterface $clientRepository)
    {

        $this->selectedClient = $this->client;
        $this->clientChoices = $clientRepository->clientChoices();
    }



    public function prepareDelete($id)
    {
        $this->deleteId = $id;
    }


    public function deleteContact(ContactRepositoryInterface $contactRepository)
    {
        $this->emit('contactDeleted');
        $contactRepository->delete($this->deleteId);
        $this->deleteId =null;
    }

    public function render(ContactRepositoryInterface $contactRepository)
    {
        return view('livewire.contact.table',[

            'contacts' => $contactRepository->search($this->search,$this->selectedClient),

        ]);
    }
}
