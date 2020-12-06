<?php

namespace App\Observers;

use App\Models\PaymentTerm;

class InvoiceObserver
{

    public function created($invoice)
    {

        $invoice->update([

            'number' => "F-".str_pad($invoice->id, 7, "0", STR_PAD_LEFT)

        ]);

        $this->checkTermStatus($invoice);
    }

    public function updated($invoice)
    {
        $this->checkTermStatus($invoice);
    }




    protected function checkTermStatus($invoice)
    {
        $term           = $invoice->paymentTerm;

        $invoicesAmountCheck = $term->invoices()->paidInvoices()->sum('amount') == $term->amount;

        if ( $invoicesAmountCheck )
        {
            $term->update([

                'status' => PaymentTerm::DONE
            ]);

            return false;
        }


        if ( today() >= $term->date and !$invoicesAmountCheck  )
        {
            $term->update([
                'status' => PaymentTerm::DELAYED
            ]);
        }


        if ( today() <= $term->date and !$invoicesAmountCheck   )
        {
            $term->update([
                'status' => PaymentTerm::UPCOMING
            ]);
        }
    }
}
