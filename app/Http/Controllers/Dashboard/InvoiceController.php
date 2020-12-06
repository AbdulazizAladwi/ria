<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Repositories\Eloquent\PaymentTermRepository;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(OpportunityRepositoryInterface $opportunityRepository)
    {
        return view('dashboard.invoices.index', [
            'title' =>  trans('site.invoices')
        ]);
    }

    public function paymentInvoices($term_id, PaymentTermRepositoryInterface $paymentTermRepository)
    {
        $term = $paymentTermRepository->find($term_id);
        return view('dashboard.invoices.payment-invoices.index', [
            'title' =>  trans('site.payment_invoice') . " - ". $term->name ,
            'term_id'  => $term_id,
            'opportunity'   => $term->opportunity
        ]);
    }

    public function create($term_id, PaymentTermRepositoryInterface $paymentTermRepository)
    {
        $opportunity_id = $paymentTermRepository->find($term_id)->opportunity_id;
        return view('dashboard.invoices.payment-invoices.create', [
            'title' =>  trans('site.create_payment_invoice'),
            'term_id'  => $term_id,
            'opportunity_id'   => $opportunity_id

        ]);
    }

    public function edit($invoice_id, InvoicesRepositoryInterface $invoicesRepository)
    {
        $invoice = $invoicesRepository->find($invoice_id);
        return view('dashboard.invoices.payment-invoices.edit', [
            'title'              =>  trans('site.edit_payment_invoice'),
            'invoice'            =>  $invoice
        ]);

    }

}
