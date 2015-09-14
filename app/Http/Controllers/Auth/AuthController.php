<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\TipoUser;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\LoginRules;
use App\Http\Requests\ChangePasswordRules;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    private $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getChangePassword',
                                                 'postChangePassword']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_tipo' => 0
        ]);
    }

    public function getLogin(){

            return view('auth.login', ['tabs' => ""]);

    }

  public function postLogin(LoginRules  $request) {

      $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
          );

      $remember = false;

      if($request->input('remember') != null){
        $remember = true;
      }

      // doing login.
      if (\Auth::validate($userdata)) {
          if (\Auth::attempt($userdata,$remember)) {
            $user = \Auth::user();
            if($user->enrolado == 0){
              return redirect('auth/change-password');
            }

            $tipo_user = TipoUser::find($user->id);
            return redirect($tipo_user->pantalla);
        }
      } 
      else {
        // if any error send back with message. 
        return redirect('/')->withErrors("El email o la contaseña se encuentran incorrectas.");;
      }
    
  }

    public function getLogout() {
      \Auth::logout(); // logout user
      return redirect('/'); //redirect back to login
    }

    public function getRegistrar(){

            return view('auth.register', ['tabs' => ""]);
    }

    public function postRegistrar(RegisterRules $request){

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'id_tipo' => 0,
            'enrolado' => 0,
            'id_nivel_docente' => 0
        ]);

        if(isset($docente->id)){
            $mensaje = "Su usuario fue agregado exitosamente. Ya puede ingresar con su email y contraseña.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('login')->with('mensaje', $mensaje)
                                   ->with('class', $class);

        
    }

    public function getChangePassword(){
        $mensaje = "Para poder continuar debe cambiar la contraseña.";
        $class = "alert alert-danger";
        $user = \Auth::user();
        
            return view('auth.changePassword', ['mensaje' => $mensaje,
                'class' => $class, 'tabs' => "", 'user' => $user]);
    }

    public function postChangePassword(ChangePasswordRules $request, $id)
    {
                    $user = User::find($id)->update([
                  'password' => bcrypt($request->input('password')),
                  'enrolado' => 1
              ]);

              $mensaje = "Ya puede iniciar seccion con su contraseña nueva.";
              $class = "alert alert-success";

            \Auth::logout(); // logout user
            return redirect('/')->with('mensaje', $mensaje)
                                         ->with('class', $class);

    }

}
