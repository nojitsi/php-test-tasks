<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\DataMappers\UserDataMapperInterface;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Session\SessionManager;

class authController extends Controller
{
    private $userDataMapper;

    public function __construct(UserDataMapperInterface $userDataMapper)
    {
        $this->userDataMapper = $userDataMapper;
    }

    public function viewSignInForm(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('/user-page');
        }
        return view('auth');
    }

    public function auth(Request $request)
    {
        $username = $request->input('login');
        $userPass = $request->input('password');
        try {
            $user = $this->userDataMapper->getUserByLogin($username);
            $user->checkPasswordIdentity($userPass);
            $request->session()->put('username', $user->name);
            return redirect('/user-page');
        }
        catch (ModelNotFoundException $exception) {
            return redirect('/')->withInput()->withErrors(['There is no user with such login']);
        }
        catch (UnauthorizedException $exception) {
            return redirect('/')->withInput()->withErrors(['Wrong password']);
        }
    }

    public function showUserPage(Request $request)
    {
        if ($request->session()->has('username')) {
            $username = $request->session()->get('username');
            return view('userpage', compact('username'));
        }
        else {
            return redirect('/')->withErrors(['Please sign in first']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect('/')->with('message', 'You logged out');
    }
}
