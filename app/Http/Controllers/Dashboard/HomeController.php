<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use PDF;

class HomeController extends Controller
{

    protected $clientRepository;
    protected $opportunityRepository;

    public function __construct(ClientRepositoryInterface $clientRepository,OpportunityRepositoryInterface $opportunityRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->opportunityRepository = $opportunityRepository;

    }

    public function index()
    {
        return view('dashboard.home',[
            'title'              => trans('site.home'),
            'clientsCount'       => $this->clientRepository->clientsCount(),
            'wonCount'           => $this->opportunityRepository->wonCounts(),
            'holdCount'          => $this->opportunityRepository->holdCounts(),
            'lostCount'          => $this->opportunityRepository->lostCounts(),
            'canceledCount'      => $this->opportunityRepository->canceledCount(),
            'opportunitiesCount' => $this->opportunityRepository->opportunitiesCount(),

        ]);
    }


}

