<?php


namespace App\Repositories\Eloquent;


use App\Models\Proposal;
use App\Repositories\Interfaces\ProposalRepositoryInterface;

class proposalRepository extends BaseRepository implements ProposalRepositoryInterface
{
    public function __construct(Proposal $model)
    {
        parent::__construct($model);
    }

    public function search($from, $to, $client)
    {

        if (empty($from) and empty($to) and empty($client))
        {
            return null;
        }

       $query = $this->model->with('requirement');

       if ( $from )
       {
          $query =  $query->where('date', '>=', $from);
       }

       if ( $to)
       {
         $query =   $query->whereBetween('date', array($from, $to));
       }

       if ( $client )
       {
           $query = $query->where('client_id', $client);

       }

       return $query->paginate();
    }

}
