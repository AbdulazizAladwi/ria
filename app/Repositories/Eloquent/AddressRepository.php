<?php


namespace App\Repositories\Eloquent;


use App\Models\Address;
use App\Repositories\Interfaces\AddressRepositoryInterface;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    /**
     * AddressRepository constructor.
     *
     * @param Address $model
     */

    public function __construct(Address $model)
    {
        parent::__construct($model);
    }
}
