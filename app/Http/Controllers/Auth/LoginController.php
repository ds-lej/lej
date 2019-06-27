<?php

namespace Lej\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Lej\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        login as private trait_login;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @inheritdoc
     */
    public function showLoginForm()
    {
        return view('index');
    }

    /**
     * @inheritdoc
     */
    protected function loggedOut(Request $request)
    {
        return $this->resultRedirect('/login');
    }

    /**
     * @inheritdoc
     */
    protected function authenticated(Request $request, $user)
    {
        return $this->resultRedirect('/');
    }

    /**
     * @inheritdoc
     */
    public function sendFailedLoginResponse(Request $request)
    {
        $msgAuthFailed = trans('auth.failed');

        return $this->resultError(
            'The given data was invalid.',
            [
                $this->username() => [$msgAuthFailed],
                'password' => [$msgAuthFailed],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function username()
    {
        return 'login';
    }
}
