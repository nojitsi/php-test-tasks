<?php


namespace App\DataMappers;

use App\Factories\UserFactoryInterface;
use App\Parser\UserDataFileParserInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserDataMapper implements UserDataMapperInterface
{
    private $userDataFileParser;
    private $userFactory;

    public function __construct(UserDataFileParserInterface $userDataFileParser, UserFactoryInterface $userFactory)
    {
        $this->userDataFileParser = $userDataFileParser;
        $this->userFactory = $userFactory;
    }

    public function getUserByLogin($login)
    {
        $userData = $this->userDataFileParser->getUserData($login);
        if ($userData === null) {
            throw new ModelNotFoundException();
        }
        return $this->userFactory->resolveUser($userData['login'], $userData['password']);
    }
}
