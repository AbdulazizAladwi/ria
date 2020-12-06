<?php

namespace App\Http\Livewire\Invoice\PaymentInvoices;

use App\Models\Invoice;
use App\Models\PaymentTerm;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use Livewire\Component;

class Edit extends Component
{
    public $invoice;
    public $name, $status, $percentage, $notes;
    public $invoiceStatus;
    public $termAmount, $calculatedAmount;

    public function update(InvoicesRepositoryInterface $invoicesRepository)
    {
        $invoiceSumPercent = Invoice::where('payment_term_id', $this->invoice->paymentTerm->id)->where('status', '!=', 4)->sum('percentage');
        $maxPercent = $invoiceSumPercent - $this->invoice->percentage;

       $data =  $this->validate([
            'name'  => 'required',
            'status' => 'required',
            'notes'  => 'required',
            'percentage' => 'required|numeric|max:' . (100 - $maxPercent),
        ]);

        $amount = ($this->invoice->paymentTerm->amount * $this->percentage)/100;


        if ($this->status == 3)
       {
           if ($this->invoice->hasReceipt())
           {
               $invoicesRepository->update($this->invoice, $data + ['amount' => $amount]);
               $this->emit('invoiceUpdated', ['type' => 'success', 'message' =>  trans('site.updated_successfully')]);
           }
           else
           {
               $this->emit('addReceiptFirst', ['type' => 'warning', 'message' =>  trans('site.add_receipt_first')]);
           }
       }

       else
       {
           $invoicesRepository->update($this->invoice, $data + ['amount' => $amount]);
           $this->emit('invoiceUpdated', ['type' => 'success', 'message' =>  trans('site.updated_successfully')]);
       }

    }


    public function mount($invoice)
    {
        $statusList = Invoice::status();

        if ($invoice->status == 2)
        {
            unset($statusList[1]);
        }

        elseif ($invoice->status == 3)
        {
            unset($statusList[2], $statusList[1]);
        }

        elseif ($invoice->status == 4)
        {
            unset($statusList[1], $statusList[2], $statusList[3]);
        }

        else
        {
            $this->invoiceStatus = Invoice::status();
        }

        $this->invoiceStatus = $statusList;

        $this->termAmount = PaymentTerm::find($invoice->payment_term_id)->amount;

        $this->name = $invoice->name;
        $this->status = $invoice->status;
        $this->percentage = $invoice->percentage;
        $this->notes = $invoice->notes;

        $this->calculatedAmount = ($this->termAmount * $this->percentage)/100;

    }


    public function calculateAmount()
    {
        if (!empty($this->percentage))
        {
            $this->calculatedAmount = ($this->termAmount * $this->percentage)/100;
        }
        else
        {
            $this->calculatedAmount = 0;

        }
    }



    public function render()
    {
        return view('livewire.invoice.payment-invoices.edit');
    }
}
