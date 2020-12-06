<?php


namespace App\Repositories\Eloquent;


use App\Models\Opportunity;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;

class OpportunityRepository extends BaseRepository implements OpportunityRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Opportunity $model
     */




    public function __construct(Opportunity $model)
    {
        parent::__construct($model);
    }
    public function wonCounts()
    {
        return $this->model->wonOpportunities()->count();
    }


    public function holdCounts()
    {
        return $this->model->holdOpportunities()->count();
    }

    public function lostCounts()
    {
        return $this->model->lostOpportunities()->count();
    }

    public function canceledCount()
    {
        return $this->model->canceledOpportunities()->count();
    }

    public function opportunitiesCount()
    {
        return $this->model->count();
    }

    public function search($name, $stage, $status)
    {
        $q = $this->model->latest()->with('client','contact');

        if ( $name and !empty($name) )
        {
           $q =  $q->where('name','like',"%". $name .'%');
        }

        if ( $stage and !empty($stage) )
        {
            $q = $q->whereStage($stage);
        }


        if ( $stage and !empty($status) )
        {
            $q = $q->whereStatus($status);
        }


        return $q->paginate();




    }

    public function statusByStage($stageNumber)
    {
        return $this->model->statusByStage($stageNumber);
    }





    public function stages()
    {
        return $this->model->stages();
    }

    public function getStatus()
    {
        return $this->model->getStatus();
    }

    public function getStatusByStage($stage_id)
    {
        return $this->model->statusByStage($stage_id);
    }

    public function opportunityReport($from, $to, $stage, $status, $client)
    {
        if ( empty($from) and empty($to) and empty($stage) and empty($status) and empty($client) )
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

        if ( $stage and !empty($stage) )
        {
            $q = $q->whereStage($stage);
        }

        if ( $status and !empty($status) )
        {
            $q = $q->whereStatus($status);
        }


        if ( $client and !empty($client) )
        {
            $q = $q->whereClientId($client);
        }

        return $q->with('client','contact')->paginate();


    }


    // public function invoiceReport($from, $to, $client)
    // {
    //     if ( empty($from) and empty($to) and empty($client) )
    //     {
    //         return null;
    //     }


    //     $q = $this->model->wonOpportunities()->latest()->has('invoices','!=',0);


    //     if ( $from and !empty($from) )
    //     {
    //         if ( $to and !empty($to) )
    //         {
    //             $q = $q->whereBetween('created_at',[$from,$to]);

    //         } else {

    //             $q = $q->whereBetween('created_at',[$from,now()->toDateString()]);
    //         }
    //     }

    //     if ( $client and !empty($client) )
    //     {
    //         $q = $q->whereClientId($client);
    //     }

    //     return $q->with('invoices.receipt','contact')->paginate();

    // }

     public function wonOpportunities($search)
     {
         if (empty($search))
         {
             return $this->model->with('client', 'contact')->WonOpportunities()->latest()->paginate();
         }

        $q = $this->model->WonOpportunities()->latest();
        $q->where('name', 'like', "%". $search ."%");
        return $q->with('client', 'contact')->paginate();

    }


}
