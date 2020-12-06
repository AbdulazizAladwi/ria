<?php


namespace App\Repositories\Eloquent;

use App\Models\Team;
use App\Repositories\Interfaces\TeamRepositoryInterface;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

    public function search($name)
    {
        return $this->model->where('name', 'like', '%'. $name .'%')->latest()->paginate(5);

    }

    public function teamsChoices()
    {
        return $this->model->pluck('name','id');
    }

}
