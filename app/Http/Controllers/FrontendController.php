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
use App\Http\Models\Account;

use Config;
use Auth;
use Redirect;

abstract class FrontendController extends BaseController {

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
		//debug bar for admin only
		if(Auth::check()){
			$account = Auth::user();
			if ($account->user_group_id == GROUP_ADMIN){
				Config::set('app.debug', 1);
				Config::set('debugbar.enabled', 1);
			}else{
				Config::set('app.debug', 0);
				Config::set('debugbar.enabled', 0);
			}
		}else{
			Config::set('app.debug', 0);
			Config::set('debugbar.enabled', 0);
		}
		
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

		//load frontend--------------
		$ads_id = array();
		$this->data['advertisingsTOP1'] = Advertising::get_for_public('TOP1', 1);
		foreach($this->data['advertisingsTOP1'] as $temp){
			$ads_id[] = $temp->id;
		}	
		$this->data['advertisingsTOP2'] = Advertising::get_for_public('TOP2', 1);
		foreach($this->data['advertisingsTOP2'] as $temp){
			$ads_id[] = $temp->id;
		}	
		$this->data['advertisingsTOP3'] = Advertising::get_for_public('TOP3', 1);
		foreach($this->data['advertisingsTOP3'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsLEFT'] = Advertising::get_for_public('LEFT', 1);
		foreach($this->data['advertisingsLEFT'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsRIGHT1'] = Advertising::get_for_public('RIGHT1', 4);
		foreach($this->data['advertisingsRIGHT1'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsRIGHT2'] = Advertising::get_for_public('RIGHT2', 1);
		foreach($this->data['advertisingsRIGHT2'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsBOTTOM1'] = Advertising::get_for_public('BOTTOM1', 1);
		foreach($this->data['advertisingsBOTTOM1'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsBOTTOM2'] = Advertising::get_for_public('BOTTOM2', 3);
		foreach($this->data['advertisingsBOTTOM2'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsBOTTOM3'] = Advertising::get_for_public('BOTTOM3', 1);
		foreach($this->data['advertisingsBOTTOM3'] as $temp){
			$ads_id[] = $temp->id;
		}
		$this->data['advertisingsBOTTOM4'] = Advertising::get_for_public('BOTTOM4', 1);
		foreach($this->data['advertisingsBOTTOM4'] as $temp){
			$ads_id[] = $temp->id;
		}
		Advertising::update_total_show($ads_id);
		
		//menu top
		$this->data['menu_top'] = Categories::get_public();

		$this->data['page_cur'] 		= '';
		$this->data['page_cur_active'] 	= '';

		$this->data['ls_news'] = News::getRecentNotice();

		if (Request::segment(1) == 'cat' && Request::segment(2) != null) {
			foreach($this->data['menu_top'] as $cat){
				if ($cat->category_key == Request::segment(2)){
					$this->category_info = $cat;
					break;
				}
			}
			
			foreach($this->data['menu_top'] as $cat){
				if ($cat->id == $this->category_info->root_parent){
					$this->root_category_info = $cat;
					break;
				}
			}

			$this->data['page_cur'] 		= $this->category_info->template;
			$this->data['page_cur_active'] 	= $this->root_category_info->category_key;

		} elseif ((Request::segment(1) == 'news' && Request::segment(2) != null)) {
			$this->news_info = News::get_by_news_key(Request::segment(2));
			
			if (empty($this->news_info)){
				return false;
			}	
			
			foreach($this->data['menu_top'] as $cat){
				if ($cat->id == $this->news_info->category_id){
					$this->category_info = $cat;
					break;
				}
			}
			foreach($this->data['menu_top'] as $cat){
				if ($cat->id == $this->category_info->root_parent){
					$this->root_category_info = $cat;
					break;
				}
			}

			$this->data['page_cur'] 		= $this->category_info->template;
			$this->data['page_cur_active'] 	= $this->root_category_info->category_key;
			$this->data['news_cur'] 		= $this->news_info;	
			
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
