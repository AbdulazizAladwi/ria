<?php


namespace App\Repositories\Interfaces;


interface ProposalRepositoryInterface
{
    public function search($from, $to, $client);
}
