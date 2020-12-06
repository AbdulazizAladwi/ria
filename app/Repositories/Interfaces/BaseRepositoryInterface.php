<?php



namespace App\Repositories\Interfaces;


interface BaseRepositoryInterface
{
    public function all();

    public function find($id);

    public function create($attributes);

    public function update($object,$attributes);

    public function delete($id);

    public function paginate($num=null);

    public function makeArray($key,$value);
}
