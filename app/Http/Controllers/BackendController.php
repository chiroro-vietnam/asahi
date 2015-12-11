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
		//deine contant key value setting
		$settingModel = new Setting;
		$dataSetting = $settingModel->getVal();
		if(!empty($dataSetting)){
			foreach($dataSetting as $key => $val){
				$k = trim($val->key);
				$v = trim($val->current_value);
				define($k, $v, true);
			}
		}
	}


	/************************************************************************
	*	this function return array, no object
	/************************************************************************/
	public function recursive_category($list_category, $parent = 0, $prefix = '', $tree = array()){
		if($list_category){
			foreach($list_category as $key => $value){
				if($value->parent == $parent){
					$value->name = $prefix.$value->name;
					$tree[] = get_object_vars($value);
					$id = $value->id;
					unset($list_category[$key]);
					$tree = $this->recursive_category($list_category, $id, $prefix . '--- ', $tree);
				}
			}
		}
		return $tree;
	}

	
}
