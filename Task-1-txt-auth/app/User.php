<?php


namespace App;


use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class User
{
    public $name;
    private $password;

    public function __construct($username, $password)
    {
        $this->name = $username;
        $this->password = $password;
    }

    public function checkPasswordIdentity($incomingPassword)
    {
        if($this->password !== $incomingPassword) {
            throw new UnauthorizedException();
        }
    }
}
