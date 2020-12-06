<?php


namespace App\Repositories\Eloquent;


use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Contact $model
     */

    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function paginatedContacts($num = null)
    {
        $q = $this->model->latest()->with('client');

        if ( is_null($num) )
        {
            return $q->paginate();
        }

        return $q->paginate($num);
    }

    public function getClientContacts($client_id)
    {
      return  $this->model->where('client_id', $client_id)->get();

    }


    public function search($name, $clientId)
    {
        $query = $this->model->latest()->with('client');

        if ( $name and !empty($name) )
        {
            $query = $query->where('name','like','%'. $name .'%');
        }

        if ( $clientId and !empty($clientId) )
        {
            $query  = $query->whereClientId($clientId);
        }

        return $query->paginate();
    }




}
