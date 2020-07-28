<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\DataMappers\UserDataMapperInterface;

class authController extends Controller
{
    private $userDataMapper;

    public function __construct(UserDataMapperInterface $userDataMapper)
    {
        $this->userDataMapper = $userDataMapper;
    }

    public function auth(Request $request){
        $username = $request->input('login');
        $userPass = $request->input('password');
        $this->userDataMapper->getUserByLogin($username);
        var_dump($username);
        dd($userPass);
    }
}
