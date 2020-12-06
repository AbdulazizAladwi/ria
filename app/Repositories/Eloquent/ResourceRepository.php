<?php


namespace App\Repositories\Eloquent;


use App\Models\Resource;
use App\Repositories\Interfaces\ResourceRepositoryInterface;

class ResourceRepository extends BaseRepository implements ResourceRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Resource $model
     */

    public function __construct(Resource $model)
    {
        parent::__construct($model);
    }

    public function paginatedResources($search="",$num = null)
    {
        $q = $this->model->with('team')->latest();

        if ( !empty($search) )
        {
            $q->where('name','like','%'. $search .'%')->paginate($num);
        }

        return $q->paginate($num);
    }

    public function estimationTypes()
    {
        return $this->model->estimationTypes();
    }


}
