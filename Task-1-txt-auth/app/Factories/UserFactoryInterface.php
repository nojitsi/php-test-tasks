<?php


namespace App\Factories;


interface UserFactoryInterface
{
    public function resolveUser($username, $userPass);
}
