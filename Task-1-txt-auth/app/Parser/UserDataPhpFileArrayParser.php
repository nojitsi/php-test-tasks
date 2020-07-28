<?php


namespace App\Parser;


class UserDataPhpFileArrayParser implements UserDataFileParserInterface
{
    private $usersData;
    public function __construct()
    {
        $userDataFilePath = config('parser.userDataFile');
        $this->usersData = include $userDataFilePath;
    }

    public function getUserData($username)
    {
        $userData = $this->usersData[$username] ?? null;
        return $userData;
    }
}
