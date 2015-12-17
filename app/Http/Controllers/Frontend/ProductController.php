<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use App\Http\Models\SellProduct;
use App\Http\Models\CategoryProduct;
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


class ProductController extends FrontendController
{
	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            $title_sell_product = '販売';
            $tile_branch = '自社ブランド';
            $title_cat_product = '販売';
            $products = SellProduct::getAllSellPro();
            $catSell = CategoryProduct::getCatSell();
            $lps = SellProduct::getListPro();
            return view('frontend.product.list', compact('products', 'title_sell_product', 'tile_branch', 'title_cat_product','catSell' ,'lps'));
	}
        
                /************************************************************************
	*@Rental detail
        * 
        * 
        *
	/************************************************************************/
        public function productDetail($id){
            $title_product = 'レンタルサービス';
            $product = SellProduct::getSellProById($id);
            $catSell = CategoryProduct::getCatSell();
            $lps = SellProduct::getListPro();
            return view('frontend.product.detail', compact('product','title_product','catSell','lps'));
        }

}
