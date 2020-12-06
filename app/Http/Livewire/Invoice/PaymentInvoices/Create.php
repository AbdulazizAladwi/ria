<?php

namespace App\Http\Livewire\Invoice\PaymentInvoices;

use App\Models\Invoice;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Livewire\Component;

class Create extends Component
{
    public $invoiceStatus;
    public $invoiceSumPercent,$termAmount, $termPercentage;
    public $term_id, $number;
    public $name, $percentage, $notes;
    public $amount;


    public function mount($term_id, PaymentTermRepositoryInterface $paymentTermRepository)
    {
        $term = $paymentTermRepository->find($term_id);
        $this->termAmount = $term->amount;
        $this->termPercentage = $term->percentage;

        $this->term_id = $term_id;
        $this->amount = 0;
    }

    public function resetInputs()
    {
        $this->name = null;
        $this->notes = null;
        $this->percentage = null;
    }

    public function calculateAmount()
    {
        if (!empty($this->percentage))
        {
            $this->amount = ($this->termAmount * $this->percentage)/100;
        }
        else
        {
            $this->amount = 0;
        }
    }



    public function store(InvoicesRepositoryInterface $invoicesRepository)
    {

        $invoiceSum = Invoice::where('payment_term_id', $this->term_id)->where('status', '!=', 4)->sum('percentage');
        $this->invoiceSumPercent = $invoiceSum;

        $data = $this->validate([
            'name'  => 'required',
            'notes'  => 'required|max:255',
            'percentage' => 'required|numeric|max:'. (100 - $this->invoiceSumPercent),
        ]);


        $invoicesRepository->create( $data + ['payment_term_id' => $this->term_id, 'amount' => $this->amount]);

        $this->emit('invoiceAdded', ['type' => 'success', 'message' =>  trans('site.added_successfully')]);

    }


    public function resetData()
    {
        $this->reset(['name', 'percentage', 'notes', 'amount']);
        $this->resetValidation();
    }


    public function render()
    {
        return view('livewire.invoice.payment-invoices.create');
    }
}
