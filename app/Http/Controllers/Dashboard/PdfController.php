<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\ScopeOfWork;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use PDF;

class PdfController extends Controller
{

    public function pdfProposal($proposal_id, ProposalRepositoryInterface $proposalRepository)
    {

        $proposal =  $proposalRepository->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;

        $data = [
            'proposal'      => $proposal,
            'opportunity'   => $opportunity,
        ];

        return view('dashboard.opportunities.pdf.proposal', $data);
    }

    public function pdfSow($sow_id)
    {

        $sow =  ScopeOfWork::findOrFail($sow_id);
        $opportunity = $sow->requirement->opportunity;

        $data = [
            'sow'      => $sow,
            'opportunity'   => $opportunity,
        ];

        return view('dashboard.opportunities.pdf.sow', $data );

    }

    public function pdfInvoice(Invoice $invoice)
    {
        return view('dashboard.invoices.prints.invoice', [
            'invoice' => $invoice
        ]);
    }

    public function pdfReceipt(Receipt $receipt)
    {
        return view('dashboard.invoices.prints.receipt', [
            'receipt' => $receipt
        ]);
    }

}
