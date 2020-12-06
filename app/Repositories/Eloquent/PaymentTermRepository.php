<?php


namespace App\Repositories\Eloquent;

use App\Models\PaymentTerm;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;


class PaymentTermRepository extends BaseRepository implements PaymentTermRepositoryInterface
{

    public function __construct(PaymentTerm $model)
    {
        parent::__construct($model);
    }




    public function terms($opportunity_id, $search=null, $status=null)
    {
        if (empty($search) and empty($status))
        {
            return $this->model->latest()->where('opportunity_id',$opportunity_id)->paginate();
        }

        $q =  $this->model->latest()->where('opportunity_id',$opportunity_id);

        if ($search)
        {
            $q->where('name', 'like','%' . $search . '%');
        }

        if ($status)
        {
            $q->where('status', $status);
        }

        return $q->paginate();

    }



}
