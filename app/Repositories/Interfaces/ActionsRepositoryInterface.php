<?php


namespace App\Repositories\Interfaces;


interface ActionsRepositoryInterface
{
    public function actions($stage,$opportunity);

    public function activityReport($from,$to,$stage,$status,$client);
}
