<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    /**
     * Username used for login.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // PERMITE ACESSO A ROTAS PÚBLICAS PARA USUÁRIOS NÃO AUTENTICADOS, EXCETO A ROTA 'logout'
        $this->middleware('guest')->except('logout');

        // PERMITE ACESSO APENAS À ROTA 'logout' PARA USUÁRIOS AUTENTICADOS
        $this->middleware('auth')->only('logout');
    }

    /**
     * Obtem o nome de usuário de login a ser usado pelo controlador.
     *
     * @return string
     */
    public function username(){

        # GET INPUT VALUE
        $loginValue = request('username');

        # CHECK IF ITS AN EMAIL OR JUST A TEXT
        $this->username = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';                

        # MERGE VALUES
        request()->merge([$this->username => $loginValue]);

        # RETURN LOGIN TYPE
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    /**
     * Tentar logar o usuário no aplicativo e verifica o 'remember me'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('inputRememberMe')
        );
    }    
}
