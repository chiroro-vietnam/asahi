<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;

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




class RentalController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            return view('frontend.rental.list');
	}

}
