<?php

namespace App\Http\Livewire\Invoice\PaymentTerms;

use App\Models\PaymentTerm;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Livewire\Component;

class Table extends Component
{
    public $opportunity_id;
    public $search;
    public $termStatus, $filteredStatus;

    public function mount($opportunity_id)
    {
        $this->opportunity_id = $opportunity_id;
        $this->termStatus     = PaymentTerm::status();
    }


    public function render(PaymentTermRepositoryInterface $paymentTermRepository)
    {
        return view('livewire.invoice.payment-terms.table', [
            'terms' => $paymentTermRepository->terms($this->opportunity_id, $this->search, $this->filteredStatus)
        ]);
    }
}
