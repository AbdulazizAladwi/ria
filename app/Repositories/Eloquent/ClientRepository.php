<?php


namespace App\Repositories\Eloquent;


use App\Models\Client;

use App\Repositories\Interfaces\ClientRepositoryInterface;


class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{


    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function search($name, $type)
    {
        $query = $this->model->latest()->with('type');


        if ( $type and !empty($type) )
        {
            $query = $query->where('type_id',$type);
        }


        if ( $name and !empty($name) )
        {
            $query = $query->where('name','like','%'. $name .'%');
        }




        return $query->paginate();



    }

    public function contacts($clientId,$search="")
    {
        $q = $this->model->find($clientId)->contacts()->with('client')->latest();

        if ( !empty($search) )
        {
            $q->where('name','like','%'. $search .'%')
                ->orWhere('email1','like',"%". $search ."%")
                ->orWhere('email2','like',"%". $search ."%")
                ->paginate();
        }
        return $q->paginate();
    }




    public function clientChoices()
    {
        return $this->model->pluck('name','id');
    }

    public function clientsCount()
    {
        return $this->model->count();
    }


    public function clientsHasContacts()
    {
        return $this->model->select('id','name')->has('contacts','!=',0)->get();
    }

}
