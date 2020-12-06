<?php

namespace App\Http\Livewire\Invoice\PaymentInvoices;

use App\Models\Invoice;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Livewire\Component;

class Table extends Component
{
    public $opportunity_id, $term_id, $search, $filteredStatus;
    public $invoiceStatus;
    public $invoice;
    public $maxPercent;
    public $changedStatus;

    public $invoiceId,$date,$receipt;

    protected $listeners = [

        'addReceiptRequested',
        'showReceiptRequested'

    ];



    public function mount($term_id, PaymentTermRepositoryInterface $paymentTermRepository)
    {
        $this->term_id            = $term_id;

        $this->maxPercent         = Invoice::where('payment_term_id', $term_id)->where('status', '!=', 4)->sum('percentage');

        $this->invoiceStatus      = Invoice::status();


    }

    public function addReceiptRequested($id)
    {
        $this->invoiceId = $id;
        $this->resetValidation();
        $this->reset(['date']);
    }

    public function showReceiptRequested($id,InvoicesRepositoryInterface $invoicesRepository)
    {
        $this->receipt = $invoicesRepository->find($id)->receipt;
    }

    public function addReceipt(InvoicesRepositoryInterface $invoicesRepository)
    {

        $data = $this->validate([

            'date' => ['required','date']
        ]);

        $invoice = $invoicesRepository->find($this->invoiceId);

        $data['number'] = $invoice->number;

        $receipt = $invoice->receipt()->create($data);

        $this->receipt = $receipt;

        $this->emit('receiptAdded');


    }

    public function getInvoiceId($id, InvoicesRepositoryInterface $invoicesRepository)
    {

       $invoice = $invoicesRepository->find($id);
       $this->invoiceStatus = Invoice::status();



        if ($invoice->status == 2)
        {
            unset( $this->invoiceStatus[1]);
        }

        elseif ($invoice->status == 3)
        {
            unset( $this->invoiceStatus[2],  $this->invoiceStatus[1]);
        }

        elseif ($invoice->status == 4)
        {
            unset( $this->invoiceStatus[1],  $this->invoiceStatus[2],  $this->invoiceStatus[3]);
        }

        else
        {
            $this->invoiceStatus = Invoice::status();
        }

       $this->invoice = $invoice;
       $this->changedStatus = $invoice->status;

    }

    public function updateStatus(InvoicesRepositoryInterface $invoicesRepository)
    {
        if ($this->changedStatus == 3)
        {
            if ($this->invoice->hasReceipt())
            {
                $invoicesRepository->update($this->invoice, ['status' => $this->changedStatus]);
                $this->emit('statusUpdated');

            }
            else
            {
                $this->emit('addReceiptFirst');
            }

        }

        else
        {
            $invoicesRepository->update($this->invoice, ['status' => $this->changedStatus]);
            $this->emit('statusUpdated');
        }

    }

    public function regenerate($id, InvoicesRepositoryInterface $invoicesRepository)
    {
        $toRegenerate = $invoicesRepository->find($id);
        $invoicesRepository->create([
            'number'  => $toRegenerate->number,
            'name'  => $toRegenerate->name,
            'status'  => 2,
            'percentage'  => $toRegenerate->percentage,
            'notes'  => $toRegenerate->notes,
            'amount' => $toRegenerate->amount,
            'payment_term_id'   => $toRegenerate->payment_term_id
        ]);

        $invoicesRepository->update($toRegenerate, ['percentage' => '0', 'amount' => '0', 'status' => '5']);

    }

    public function render(InvoicesRepositoryInterface $invoicesRepository)
    {
        return view('livewire.invoice.payment-invoices.table', [
            'invoices' => $invoicesRepository->invoices($this->term_id, $this->search, $this->filteredStatus)
        ]);
    }
}


