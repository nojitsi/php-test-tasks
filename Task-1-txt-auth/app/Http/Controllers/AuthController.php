<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class authController extends Controller
{
    public function auth(Request $request){
        $username = $request->input('login');
        $userPass = $request->input('password');
        var_dump($username);
        dd($userPass);
    }
}
