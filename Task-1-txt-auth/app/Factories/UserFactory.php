<?php


namespace App\Factories;

use App\User;

class UserFactory implements UserFactoryInterface
{
    public function resolveUser($username, $userPass)
    {
        return new User($username, $userPass);
    }
}
