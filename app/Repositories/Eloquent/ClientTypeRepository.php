<?php


namespace App\Repositories\Eloquent;


use App\Models\ClientType;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;


class ClientTypeRepository extends BaseRepository implements ClientTypeRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param ClientType $model
     */

    public function __construct(ClientType $model)
    {
        parent::__construct($model);
    }

    public function search($name)
    {
        if (!empty($name))
        {
           return $this->model->where('name','like','%'. $name .'%')->latest()->paginate(3);
        }

        return $this->model->latest()->paginate(5);
    }

    public function typeChoices()
    {
        return $this->model->pluck('name','id');
    }

}
