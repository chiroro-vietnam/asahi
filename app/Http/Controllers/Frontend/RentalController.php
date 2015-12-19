<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use App\Http\Models\Rental;
use App\Http\Models\RentalProduct;
use App\Http\Models\CategoryRental;

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
        $catRentals = CategoryRental::getAllCatRental();
        $lrs = RentalProduct::getListRental();        
        return view('frontend.rental.list', compact('rentals', 'title_rental', 'title_cat_rental', 'catRentals', 'lrs'));
    }

    /************************************************************************
    *@Rental detail
    * 
    * 
    *
    /************************************************************************/
    public function rentalDetail($id){
        $catRentals = CategoryRental::getAllCatRental();
        $title_rental = 'レンタルサービス';
        $rental = Rental::getRentalDetail($id);

        $lrs = RentalProduct::getListRental();
        return view('frontend.rental.detail', compact('rental', 'title_rental', 'rentals', 'catRentals', 'lrs'));
    }

    /************************************************************************
    *@Rental agree
    * 
    * 
    *
    /************************************************************************/
    public function rentalAgree(){
       return view('frontend.rental.agree'); 
    }
    

}
