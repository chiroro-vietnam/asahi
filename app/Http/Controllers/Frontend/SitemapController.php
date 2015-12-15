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


class SitemapController extends FrontendController{
    

        /************************************************************************
	*
        * 
        * 
        *
	/************************************************************************/
	public function siteMap()
        {        
            return view('frontend.sitemap.index');
	}
        

}
