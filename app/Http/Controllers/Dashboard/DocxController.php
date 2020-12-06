<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class DocxController extends Controller
{
    public function docxInvoice($id, InvoicesRepositoryInterface $invoicesRepository)
    {
        $invoice = $invoicesRepository->find($id);
        $template = new TemplateProcessor('dashboard/docs/invoice.docx');
        $filename = $invoice->number . '.docx';

        $template->setValue('number', $invoice->number);
        $template->setValue('date', $invoice->created_at);
        $template->setValue('amount', $invoice->amount);
        $template->setValue('companyName', $invoice->client->name);
        $template->setValue('streetName', $invoice->client->address()->street ?? '-');
        $template->setValue('zipCode', $invoice->client->address()->zip_code ?? '-');
        $template->setValue('companyPhone', $invoice->client->phone1 ?? '-');



        $template->saveAs($filename);
        return response()->download($filename)->deleteFileAfterSend(true);

    }
}
