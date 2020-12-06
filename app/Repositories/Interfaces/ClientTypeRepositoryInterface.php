<?php


namespace App\Repositories\Interfaces;


interface ClientTypeRepositoryInterface
{
    public function search($name);

    public function typeChoices();
}
