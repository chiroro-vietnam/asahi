<?php namespace App\Http\Controllers\Admin;
use Acme\Repositories\UserRepository as UserRepository;
use Acme\Services\UserValidation as UserValidation;

use Acme\Interfaces\UserValidationInterface as UserValidationInterface;
use Acme\Interfaces\UserInterface as UserInterface;
use App\Http\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;

use App\User;
use Auth;
use Request;
use Validator;
use Input;
use Redirect;
use Hash;
use Session;
use Html;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminController extends BackendController
{        
    /************************************************************************
    *
    /************************************************************************/
    public function __construct(Guard $auth, Registrar $registrar)
    {
        parent::__construct();
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->middleware('auth', ['except' => array('getLogin', 'postLogin')]);
    }

    /************************************************************************
    * get admin login
    /************************************************************************/
    public function getLogin(){
            if(Auth::check()) return redirect()->route('admin.dashboard.index');
            return view('admin.auth.login');
    }

    /************************************************************************
    * post admin login
    /************************************************************************/
    public function postLogin(){
        $adminInput = array(
                'email'		=> trim(Input::get('email')),
                'password' 	=> trim(Input::get('password')),
        );
        
        $validator = Validator::make(Input::all(), User::$rules, User::$message);
        if($validator->passes()){				
            if(Auth::attempt($adminInput, false)){					
                return redirect()->route('admin.dashboard.index');
            }else
                Session::flash('success', 'ユーザIDまたは間違ったパスワード');
                return redirect()->route('admin.auth.login');
        }else{
            Session::flash('success', 'ユーザIDまたは間違ったパスワード');
            return redirect()->route('admin.auth.login');
        }
    }

    /************************************************************************
    * Admin logout
    /************************************************************************/
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.auth.login');
    }    
}
