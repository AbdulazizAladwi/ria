<?php


namespace App\Repositories\Eloquent;

use App\Models\Invoice;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;

class InvoiceRepository extends BaseRepository implements InvoicesRepositoryInterface
{

    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }


    public function invoices($term_id, $search, $status_id)
    {
        $q= $this->model->where('payment_term_id', $term_id);

        if ($search)
        {
            $q->where('name', 'like', '%' . $search .'%');
        }

        if ($status_id)
        {
            $q->where('status', $status_id);
        }

        return $q->latest()->paginate();

    }

    public function invoiceReport($from, $to, $client)
    {
        if ( empty($from) and empty($to) and empty($client) )
         {
            return null;
         }

        $q = $this->model->latest();

        if ( $from and !empty($from) )
        {
            if ( $to and !empty($to) )
            {
                $q = $q->whereBetween('created_at',[$from,$to]);

            } else {

                $q = $q->whereBetween('created_at',[$from,now()->toDateString()]);
            }
        }

        if ( $client and !empty($client) )
        {
            $q = $q->whereHas('paymentTerm.opportunity',function($query) use($client){

                return $query->whereClientId($client);

            });
        }

        return $q->with('paymentTerm.opportunity','receipt')->paginate();



    }





}
