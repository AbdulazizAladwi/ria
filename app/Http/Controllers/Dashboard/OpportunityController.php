<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;

class OpportunityController extends Controller
{

    protected $opportunityRepository;
    public $clients;
    public $opportunity = 'Opportunity';


    public function __construct(ClientRepositoryInterface $clientRepository, OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->clients = $clientRepository->all();
        $this->opportunityRepository = $opportunityRepository;

    }



    public function index()
    {
        return view('dashboard.opportunities.index',
        [
            'title' => $this->opportunity
        ]);
    }


    public function create()
    {
        $clients = $this->clients;
        return view('dashboard.opportunities.create', compact('clients'));
    }




    public function show($id)
    {
        $opportunity = $this->opportunityRepository->find($id);

        return view('dashboard.opportunities.show',[
            'title'       => $opportunity->name,
            'opportunity' => $opportunity
        ]);

    }

    public function destroy($id)
    {
        //
    }
}
