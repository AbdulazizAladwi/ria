<?php


namespace App\Repositories\Interfaces;


interface ResourceRepositoryInterface
{
    public function paginatedResources($search="",$num=null);
    public function estimationTypes();
}
