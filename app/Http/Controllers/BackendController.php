<?php namespace App\Http\Controllers;
use App\Http\Models\News;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use App\Http\Models\Setting;
use Illuminate\Support\Facades\Request;

use App\Http\Models\Advertising;
use App\Http\Models\Slider;
use App\Http\Models\Categories;
use App\Http\Models\Page;

abstract class BackendController extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public $data = NULL;
	public $news_info = array();
	public $category_info = array();
	public $root_category_info = array();


	/************************************************************************
	*
	/************************************************************************/
	public function __construct()
	{
		
	}


	/************************************************************************
	*	this function return array, no object
	/************************************************************************/

	
}
