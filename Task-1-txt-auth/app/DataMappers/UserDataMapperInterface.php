<?php


namespace App\DataMappers;


interface UserDataMapperInterface
{
    public function getUserByLogin($login);
}
