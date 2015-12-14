<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
//use Illuminate\Routing\Controller as BaseController;
use Validator;
use Auth;
use Session;
use Input;
use Redirect;
use Html;
use League\Flysystem\Filesystem;
use View;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



class HomepageController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            return view('frontend.homepage');
	}

}
