<?php

namespace App\Http\Livewire\Client;

use App\Models\SisterCompany;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateUpdateClient extends Component
{

    public $clientTypes,$client;

    public $update  = false;

    public $sisterCompanies = [];

    public $fields = [];



    public function mount($client,ClientTypeRepositoryInterface $clientTypeRepository)
    {
        $this->clientTypes = $clientTypeRepository->typeChoices();

        if ( !is_null($client) )
        {
            $this->update = true;
            $this->client = $client;
            $this->fields = array_merge($client->toArray(),$client->address->toArray());
            $this->sisterCompanies = $client->sisterCompanies->toArray();

        }



    }

    public function add()
    {
        $this->sisterCompanies[] = ['id'=>"",'name' => "",'phone1'=>"",'phone2'=> "",'email1' =>"","email2"=>""];
    }

    public function remove($index)
    {
        if ( $this->update )
        {
            $company = SisterCompany::find($this->sisterCompanies[$index]['id']);
            $company ? $company->delete() : '';
        }
        unset($this->sisterCompanies[$index]);
        array_values($this->sisterCompanies);
    }


    public function addUpdateClient(ClientRepositoryInterface $clientRepository)
    {

         $data = $this->validateData();


         $client = $this->update ? $this->client : $clientRepository->create($data['fields']);

         $this->update ? $clientRepository->update($client,$data['fields']): '';

         $this->insertAddress($client,$data);

        if ( count($this->sisterCompanies) != 0 )
        {
            $this->insertSisterCompanies($client,$data['sisterCompanies']);
        }


        if ( $this->update )
        {
            $this->emit('clientUpdated', ['type' => 'success', 'message' =>  trans('site.updated_successfully')]);
        }
        else
        {
            $this->emit('clientAdded', ['type' => 'success', 'message' =>  trans('site.added_successfully')]);
        }

    }


    protected function insertSisterCompanies($client,$data)
    {
        foreach ($data as $index => $data)
        {

            if ( $this->update )
            {
                $company = $client->sisterCompanies()->find($data['id']);
                $company ?  $company->update($data) : $client->sisterCompanies()->create($data);

            } else {

                $client->sisterCompanies()->create($data);

            }
        }
    }


    protected function insertAddress($client,$data)
    {
        if ( $this->update )
        {
            $address_data['block']    = $data['fields']['block'];
            $address_data['area']     = $data['fields']['area'];
            $address_data['street']   = $data['fields']['street'];
            $address_data['zip_code'] = $data['fields']['zip_code'];

            $client->address()->update($address_data);

        } else {

            $client->address()->create($data['fields']);
        }
    }

    protected function resetInputs()
    {
        $this->fields          = [];

        $this->sisterCompanies = [

            ['id'=>"",'name' => "",'phone1'=>"",'phone2'=> "",'email1' =>"","email2"=>""],
        ];
    }



    protected function validateData()
    {
        $rules  = [

                'fields.name'                          => ['required','max:100',Rule::unique('clients','name')->whereNull('deleted_at')],

                'fields.type_id'                       => 'required|integer',
                'fields.phone1'                        => 'nullable|numeric',
                'fields.phone2'                        => 'nullable|numeric',
                'fields.email1'                        => 'nullable|email|unique:clients,email1|max:100',
                'fields.email2'                        => 'nullable|email|different:fields.email1',
                'fields.phone_extension'               => 'nullable|numeric',
                'fields.area'                          => 'nullable|string',
                'fields.block'                         => 'nullable|numeric',
                'fields.street'                        => 'nullable|string',
                'fields.zip_code'                      => 'nullable|numeric',
                'fields.facebook'                      => 'nullable|url',
                'fields.twitter'                       => 'nullable|url',
                'fields.snapchat'                      => 'nullable|url',
                'fields.website'                       => 'nullable|url',
                'fields.instagram'                     => 'nullable|url',
                'sisterCompanies.*.name'               => 'required|max:100',
                'sisterCompanies.*.phone1'             => 'nullable|max:100',
                'sisterCompanies.*.phone2'             => 'nullable|max:100',
                'sisterCompanies.*.email1'             => 'nullable|email|unique:sister_companies,email1',
                'sisterCompanies.*.email2'             => 'nullable|email|different:sisterCompanies.*.email1',
        ];

        if ( $this->update )
        {

            $rules['fields.name']          =  ['required','max:100',Rule::unique('clients','name')->whereNull('deleted_at')->ignore($this->client->id)];
            $rules['fields.email1']        = 'nullable|email|max:100|unique:clients,email1,'.$this->client->id;
            $rules['sisterCompanies.*.id'] = 'nullable|integer';

            foreach ( $this->client->sisterCompanies as $index => $company )
            {
                $rules['sisterCompanies.'. $index .'.email1']  = 'nullable|email|max:100|email|unique:sister_companies,email1,'.$company->id;
            }


        }

        return $this->validate($rules);
    }

    public function render()
    {
        return view('livewire.client.create-update-client');
    }
}
