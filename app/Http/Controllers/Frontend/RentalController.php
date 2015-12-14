<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use App\Http\Models\Rental;
//getRental

use View;
use DB;
use Html;
use URL;
use Form;





class RentalController extends FrontendController{
    

        /************************************************************************
	*
        * 
        * 
        *
	/************************************************************************/
	public function index() 
        {
            $title_rental = 'レンタルサービス';
            $title_cat_rental = '配水ポリエチレン管融着工具';
            $rentals = Rental::getRental();

            return view('frontend.rental.list', compact('rentals', 'title_rental', 'title_cat_rental'));
	}
        
        /************************************************************************
	*@Rental detail
        * 
        * 
        *
	/************************************************************************/
        public function rentalDetail($id){
            $title_rental = 'レンタルサービス';
            $rental = Rental::getRentalDetail($id);
            return view('frontend.rental.detail', compact('rental', 'title_rental'));
        }
        
        /************************************************************************
	*@Rental agree
        * 
        * 
        *
	/************************************************************************/
        public function rentalAgree(){
            
        }
        
}
