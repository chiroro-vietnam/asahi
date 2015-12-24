<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Models\RentalProduct;
use App\Http\Models\SellProduct;
use Input;
use Redirect;
use Html;
use DB;
use View;

class SearchController extends FrontendController{
    public function __construct()
    {
            parent::__construct();
    }
    
    /************************************************************************
    * search news category
    /************************************************************************/
    public function search(){
        $this->data['keyword']  = Input::get('keyword');
        $this->data['page'] 	= Input::get('page');
        $dataSearch             = 'Result search';
        return view('frontend.search', compact('dataSearch'))->with($this->data);
    }
}

