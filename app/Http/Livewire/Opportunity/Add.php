<?php

namespace App\Http\Livewire\Opportunity;

use App\Models\Action;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $clients;
    public $getClient, $getContact;
    public $name, $date, $duration;
    public $file = [];
    public $action;
    public $contacts;
    public $count = 1;
    public $boxId;
    public $showFile = false;




    public function getClientContacts(ContactRepositoryInterface $contactRepository)
    {
        $client_id = $this->getClient;
        $this->contacts = $contactRepository->getClientContacts($client_id)->toArray();
    }

    private function resetInput($i)
    {

        $this->action[$i] = null ;
        $this->date[$i] = null ;
        $this->duration[$i] = null ;
    }

    public function incrementCount()
    {
        $this->count++;
    }

    public function decrementCount($i)
    {
        $this->count--;
        $this->boxId = $i;
        $this->resetInput($this->boxId);

    }


    public function showFile()
    {
        $this->showFile = true;
    }

    public function resetAfterAdd()
    {
       $this->getClient = null;
       $this->getContact = null;
       $this->name = null;
       $this->date = null;
       $this->action = null;
       $this->contacts = null;
       $this->count = 1;
    }

    public function StoreOpportunity(OpportunityRepositoryInterface $opportunityRepository)
    {


        $this->validate([
           'name' => ['required','max:100',Rule::unique('opportunities')->whereNull('deleted_at')],
           'getClient'  => 'required',
           'getContact' => 'nullable|integer',
           'file.*'     => 'nullable|file|mimes:jpeg,bmp,png,pdf,docx,xlsx',
           'duration.*' => 'nullable|integer|between:1,9',
       ]);

       $opportunity = $opportunityRepository->create([
           'name'        =>   $this->name,
           'client_id'   =>   $this->getClient,
           'contact_id'  =>   $this->getContact ?? null,
       ]);

       #Getting fileNames (uploads)
        $filesName = [];
       if ($this->file){
           foreach ($this->file as $index=>$file){
               $filesName[$index] = $file ? $file->storeAs('opportunities', $this->file[$index]->getClientOriginalName() , 'public') : null;

           }
       }

       if ($this->action || $this->date || $this->file){
           $dataArray = [];
           $count = $this->count;
           for($i=1;$i<=$count;$i++)
           {
               $dataArray[] = [
                   'description'    => $this->action[$i] ?? null,
                   'date_time'      => $this->date[$i] ?? null,
                   'opportunity_id' => $opportunity['id'] ?? null,
                   'stage_number'       => '1',
                   'file'               => $filesName[$i] ?? null,
                   'duration'           => !empty($this->duration[$i]) ? $this->duration[$i] : null,
                   'created_at'         => Carbon::now(),
                   'updated_at'         => Carbon::now(),
               ];
           }

           Action::insert($dataArray);

       }

        $this->emit('Opportunity_added');
        $this->resetAfterAdd();
        $this->showFile = false;
        return redirect()->route('dashboard.opportunities.show', $opportunity->id);

    }


    public function mount(ClientRepositoryInterface $clientRepository)
    {
        $this->clients = $clientRepository->all();
    }


    public function render()
    {
        return view('livewire.opportunity.add', [
            'clients' => $this->clients
        ]);
    }
}
