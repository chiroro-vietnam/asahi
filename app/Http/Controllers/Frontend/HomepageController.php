<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use Input;
use Redirect;
use Html;
use View;
use DB;
use App\Http\Models\CategoryProduct;
use App\Http\Models\SellProduct;
use App\Http\Models\CategoryRental;
use App\Http\Models\RentalProduct;
use Illuminate\Pagination\Paginator;




class HomepageController extends FrontendController
{
    /************************************************************************
    *TOP PAGE
    /************************************************************************/
    public function index() 
    {
        //rental top page
        $catRenTop = CategoryRental::topCatRental();
        $rentalTop = DB::table('rental_product')
                ->rightJoin('top_page_show', 'rental_product.id', '=', 'top_page_show.rental_product_id')
                ->leftJoin('category_rental', 'rental_product.cat_rental_id', '=', 'category_rental.id')
                ->select('rental_product.*', 'category_rental.name')
                ->where('rental_product.is_deleted', '=', NO_DELLETE)
                ->where('rental_product.display','=', 1)
                ->where('rental_product.display_top', '=', 1)
                ->where('top_page_show.is_deleted', '=', NO_DELLETE)
                ->orderBy('rental_product.order', 'ASC')
                ->limit(TOP_PAGE_NUMBER)
                ->get();
        
        //product top page
        $catSellTop = CategoryProduct::topCatSell();
        $prTop = DB::table('sell_product')
                ->rightJoin('top_page_show', 'sell_product.id', '=', 'top_page_show.sell_product_id')
                ->leftJoin('category_product', 'sell_product.cat_product_id', '=', 'category_product.id')
                ->select('sell_product.*', 'category_product.name')
                ->where('sell_product.is_deleted', '=', NO_DELLETE)
                ->where('sell_product.display','=', 1)
                ->where('sell_product.display_top', '=', 1)
                ->where('top_page_show.is_deleted', '=', NO_DELLETE)
                ->orderBy('sell_product.order', 'ASC')
                ->limit(TOP_PAGE_NUMBER)
                ->get();
        
        $lrs = RentalProduct::getListRental();
        $lps = SellProduct::getListPro();
        return view('frontend.homepage', compact('catRenTop', 'catSellTop', 'rentalTop', 'prTop', 'lrs','lps'));
    }

}
