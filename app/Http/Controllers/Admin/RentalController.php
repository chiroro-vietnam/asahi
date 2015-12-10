<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Models\Rental;
use App\Http\Models\CategoryRental;
use Paginator;
use HTML;
use Redirect;
use Request;
use Input;
use Form;
use DB;

class RentalController extends Controller
{
    public function index(){

    }


    //rental    
    public function getOsusume()
    {
        return view('admin.rental.osusume');
    }
    //rental
    public function postOsusume()
    {
        
    }
    
    //category rental
    public function getCatategory()
    {
        return view('admin.rental.category');
    }
    //category rental
    public function postCatategory()
    {
        
    }
    
    //product rental list
    public function listProRental($cr_id = null)
    {
        if($cr_id != null){
            $rp = $this->_searchRentPro($cr_id);
            return view('admin.product.rental.list', compact('rp', 'cr_id', 'crs'));
        }  else {
            $crs = DB::table('category_rental')->where('is_deleted', NO_DELLETE)->lists('name', 'id');
            if(Input::has('btmSearchRT'))
            {            
               $cr_id = Input::get('cat_rental');
               $rp = $this->_searchRentPro($cr_id);
               return view('admin.product.rental.list', compact('rp', 'cr_id', 'crs'));
            }else{           

            return view('admin.product.rental.list', compact('crs'));
            }
        }       
    }
    
    //get category rental
//    private function _getCatRental()
//    {
//       return DB::table('category_rental')->where('is_deleted', NO_DELLETE)->lists('name', 'id'); 
//        
//    }
    
    //Search rental product
    private function _searchRentPro($cat_rental_id)
    {
        return DB::table('rental_product')->where('is_deleted', NO_DELLETE)
                                          ->where('cat_rental_id', $cat_rental_id)
                                          ->paginate(LIMIT_PAGE);
        
    }


    //product rental add
    public function getProRentalAdd()
    {
        return view('admin.product.rental.add');
    }
    
    //product rental add
    public function postProRentalAdd()
    {
        
    }
    //product rental edit
    public function getProRentalEdit()
    {
        return view('admin.product.rental.edit');
    }
    //product rental edit
    public function postProRentalEdit()
    {
        
    }
}

