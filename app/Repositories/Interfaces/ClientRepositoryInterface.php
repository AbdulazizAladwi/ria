<?php


namespace App\Repositories\Interfaces;


interface ClientRepositoryInterface
{
    public function search($name, $type);

    public function contacts($clientId,$search="");

    public function clientChoices();

    public function clientsCount();

    public function clientsHasContacts();
}
