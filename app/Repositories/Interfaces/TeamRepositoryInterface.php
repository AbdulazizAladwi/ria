<?php


namespace App\Repositories\Interfaces;


interface TeamRepositoryInterface
{
    public function search($name);

    public function teamsChoices();

}
