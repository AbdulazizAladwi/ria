<?php

namespace App\Http\Livewire\Report;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Livewire\Component;

class InvoiceReport extends Component
{
    public $from,$to,$client;

    public $clients;


    protected $queryString = [
        'from',
        'to',
        'client'
    ];

    public function mount(ClientRepositoryInterface $clientRepository)
    {
        $this->clients = $clientRepository->clientChoices();
    }


    public function fromSelected()
    {
        $this->to = now()->toDateString();
    }

    public function render(InvoicesRepositoryInterface $invoiceRepository)
    {
        return view('livewire.report.invoice-report',[

            'invoices' => $invoiceRepository->invoiceReport($this->from,$this->to,$this->client)
        ]);
    }
}
