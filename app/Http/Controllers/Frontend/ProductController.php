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


class ProductController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            return view('frontend.product.list');
	}
        
                /************************************************************************
	*@Rental detail
        * 
        * 
        *
	/************************************************************************/
        public function productDetail(){
            $title_product = 'レンタルサービス';
            //$product = Product::getProductDetail($id);
            return view('frontend.product.detail');
        }

}
