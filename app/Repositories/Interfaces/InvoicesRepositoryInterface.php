<?php


namespace App\Repositories\Interfaces;


interface InvoicesRepositoryInterface
{
    public function invoices($term_id, $search, $status_id);
    public function invoiceReport($from, $to, $client);

}
