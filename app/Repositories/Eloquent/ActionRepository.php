<?php


namespace App\Repositories\Eloquent;


use App\Models\Action;
use App\Models\Opportunity;
use App\Repositories\Interfaces\ActionsRepositoryInterface;

class ActionRepository extends BaseRepository implements ActionsRepositoryInterface
{
    /**
     * ActionRepository constructor.
     *
     * @param Action $model
     */


    public function __construct(Action $model)
    {
        parent::__construct($model);
    }

    public function actions($stage, $opportunity)
    {
        return $opportunity->actions()->whereStageNumber($stage)->latest()->paginate(5);
    }

   

    public function activityReport($from,$to,$stage,$status,$client)
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
                $q = $q->whereBetween('date_time',[$from,$to]);

            } else {

                $q = $q->whereBetween('date_time',[$from,now()->toDateString()]);
            }
        }

        if ( $stage and !empty($stage) )
        {
            $q = $q->whereStageNumber($stage);
        }


        if ( $status and !empty($status) )
        {


            $q = $q->whereHas('opportunity',function ($query) use ($status) {

                return $query->whereStatus($status);

            });


        }


        if ( $client and !empty($client) )
        {
            $q = $q->whereHas('opportunity',function ($query) use ($client){

                return $query->where('client_id',$client);

            });
        }


        return $q->with('opportunity.client')->paginate();


    }

}
