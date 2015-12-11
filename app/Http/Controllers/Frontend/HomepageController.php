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
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Models\Categories;
use App\Http\Models\Advertising;
use App\Http\Models\Slider;
use App\Http\Models\Member;

class HomepageController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function __construct()
	{
		parent::__construct();
	}


	/************************************************************************
	*
	/************************************************************************/
	public function index() {
		$this->data['sliders'] 			= Slider::get_public();
		$this->data['page_cur'] 		= 'homepage.blade.php';
		$this->data['page_cur_active'] 	= 'homepage';
		
		return view('frontend.homepage', $this->data);
	}

}
