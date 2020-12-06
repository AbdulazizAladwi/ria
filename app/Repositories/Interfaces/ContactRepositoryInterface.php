<?php


namespace App\Repositories\Interfaces;


interface ContactRepositoryInterface
{
    public function paginatedContacts($num = null);
    public function getClientContacts($client_id);
    public function search($name,$clientId);
}
