<?php


namespace App\Repositories\Interfaces;


interface PaymentTermRepositoryInterface
{
    public function terms($opportunity_id, $search, $status);
}
