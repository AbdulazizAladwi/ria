<?php


namespace App\Repositories\Eloquent;

use App\Models\PaymentTerm;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function roles($search)
    {
        $query = Role::query();

        if ($search)
        {
            $query = $query->where('name','like','%'. $search .'%');
        }

        return $query->paginate();
    }
}
