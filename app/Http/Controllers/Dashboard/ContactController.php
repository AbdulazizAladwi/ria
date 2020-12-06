<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Contact\StoreRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactController extends Controller
{

    protected $clientRepository;
    protected $contactRepository;

    /**
     * @var $path
     */

    protected $path = 'dashboard.contacts';


    public function __construct(ClientRepositoryInterface $clientRepository,ContactRepositoryInterface $contactRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->contactRepository = $contactRepository;
    }

    public function index($client=null)
    {
        if ($client)
        {
            $client = $this->clientRepository->find($client)->id;
        }

        return view("{$this->path}.index",[
            'title'    => trans('site.contacts'),
            'client'   => $client ?? null
        ]);
    }


    public function create($client=null)
    {

        return view("{$this->path}.create",[

            'title'         => trans('site.add_contact'),
            'genderChoices' => $this->genderChoices(),
            'clientChoices' => $this->clientChoices(),
            'client'        => !is_null($client) ? $this->clientRepository->find($client) : null,

        ]);
    }

    public function show($contactId)
    {
        $contact = $this->contactRepository->find($contactId);

        return view("{$this->path}.show",[

            'title'         => trans('site.show_contact'),
            'contact'       => $contact,
            'genderChoices' => $this->genderChoices(),
            'clientChoices' => $this->clientChoices()
        ]);
    }


    public function store(StoreRequest $request,$client=null)
    {

        $data = $request->validated();

        if ( !is_null($client) )
        {
            $data['client_id'] = $client;
        }

        $this->contactRepository->create($data);

        toastSuccess(trans('site.added_successfully'));

        return redirect()->route('dashboard.clients.index');
    }

    public function edit($contactId)
    {
        return view("{$this->path}.edit",[

            'title'     => trans('site.edit_contact'),
            'contact' => $this->contactRepository->find($contactId),
            'genderChoices' => $this->genderChoices(),
            'clientChoices' => $this->clientChoices()


        ]);
    }

    public function update(UpdateRequest $request,$contactId)
    {
        $contact = $this->contactRepository->find($contactId);
        $this->contactRepository->update($contact,$request->validated());

        toastSuccess(trans('site.updated_successfully'));

        return redirect()->route('dashboard.clients.index');

    }


    protected function genderChoices()
    {
        return ['male' => trans('site.male'),'female' => trans('site.female')];
    }

    protected function clientChoices()
    {
        return $this->clientRepository->clientChoices();
    }

}
