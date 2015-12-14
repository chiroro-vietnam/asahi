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




class MakerController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            return view('frontend.maker.list');
	}

}
