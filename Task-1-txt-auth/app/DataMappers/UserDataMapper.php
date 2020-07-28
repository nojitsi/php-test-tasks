<?php


namespace App\DataMappers;

use App\Parser\UserDataFileParserInterface;

class UserDataMapper implements UserDataMapperInterface
{
    private $userDataFileParser;

    public function __construct(UserDataFileParserInterface $userDataFileParser)
    {
        $this->userDataFileParser = $userDataFileParser;
    }

    public function getUserByLogin($login)
    {
        $userData = $this->userDataFileParser->getUserData($login);
        dd($userData);
    }
}
