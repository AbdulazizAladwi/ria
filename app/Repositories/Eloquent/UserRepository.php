<?php


namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function search($text)
    {
        $query = $this->model->latest();

        if ( $text and !empty($text) )
        {
            $query = $query->where('name','like','%'. $text .'%')
                            ->orWhere('email','like','%'. $text .'%')
                            ->orWhereHas('roles',function($q) use($text) {

                                return $q->where('name','like','%'. $text .'%');

                            });
        }


        return $query->with('roles')->paginate();
    }

}
