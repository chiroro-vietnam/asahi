<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Models\CategoryRental;
use DB;
use Request;
use Validator;
use Input;
use Redirect;
use Html;
use Session;
use Paginator;

class CategoryController extends Controller
{  
    
     //category rental
    public function listCatRental()
    {
        $cat_rental = CategoryRental::getCatRental();
        return view('admin.category.rental.list', compact('cat_rental'));
    }
    
    //category rental
    public function getCatRentalAdd()
    {        
        return view('admin.category.rental.add');
    }
    
     //category rental
    public function postCatRentalAdd()
    {
        $validator = Validator::make(Input::all(), CategoryRental::$rules, CategoryRental::$messages);
        if($validator->passes()){
                $set_display = !empty(Input::get('display')) ? 1 : 0;
                $inputData['name']              = Input::get('name');
                $inputData['display']		= $set_display;
//                $inputData['top']               = 0;
//                $inputData['up']		= 0;                
//                $inputData['down']              = 0;
//                $inputData['last']		= 0;               
                $inputData['created_at']	= date('Y-m-d H:i:s');
                $inputData['updated_at']	= date('Y-m-d H:i:s');

                DB::table('category_rental')->insert($inputData);
                Session::flash('success', 'The category rental add successfully.');
                return Redirect::route('admin.category.rental.list');
        }

        return Redirect::route('admin.category.rental.add')->with('message'. 'Add category rental fail, try again!')
                                                           ->withErrors($validator)
                                                           ->withInput();  
    }
    
    //category rental
    public function getCatRentalEdit()
    {
       return view('admin.category.rental.edit'); 
    }
    
    //category rental
    public function postCatRentalEdit()
    {
        
    }
    
    //deletel category rental
    public function delCatRental($id){
        DB::table('category_rental')->where('id', '=', $id)
                                    ->update(array('is_deleted' => 1));
        return Redirect::route('admin.category.rental.list')->with('message', 'Category rental has been deleted successfully');
    }
    
         //category sell
    public function listCatSell()
    {
        return view('admin.category.sell.list');
    }
    
    //category sell
    public function getCatSellAdd()
    {
        return view('admin.category.sell.add');
    }
    
     //category sell
    public function postCatSellAdd()
    {
        
    }
    
    //category sell
    public function getCatSellEdit()
    {
       return view('admin.category.sell.edit'); 
    }
    
    //category sell
    public function postCatSellEdit()
    {
        
    }
}

