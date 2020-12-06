<?php

namespace App\Http\Livewire\Report;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class ProposalReport extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $from, $to, $clients;
    public $client;



    protected $queryString = ['from', 'to', 'client'];

    public function updatingFrom()
    {
        $this->gotoPage('1');
    }


    public function mount(ClientRepositoryInterface $clientRepository)
    {
        $this->clients = $clientRepository->all();
    }


    public function render(ProposalRepositoryInterface $proposalRepository)
    {
        return view('livewire.report.proposal-report', [
            'proposals' => $proposalRepository->search($this->from, $this->to, $this->client)
        ]);
    }
}
