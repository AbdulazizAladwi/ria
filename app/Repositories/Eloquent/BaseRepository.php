<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class BaseRepository implements BaseRepositoryInterface
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($object, $attributes)
    {
        return $object->update($attributes);
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    public function paginate($num = null)
    {
        $query = $this->model->latest();

        return ( is_null($num) ) ? 

                           $query->paginate($this->model->perPage) 
                          :
                           $query->paginate($num);
    }

    public function makeArray($key, $value)
    {
        return $this->model->pluck($value,$key);
    }
}
