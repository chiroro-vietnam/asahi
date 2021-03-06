<?php namespace App\Http\Controllers\Admin;
use App\Http\Models\CategoryRental;
use App\Http\Models\CategoryProduct;
use App\Http\Models\SellProduct;
use App\Http\Models\RentalProduct;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Session;
use DB;
use Request;
use Validator;
use Input;
use Redirect;
use Html;
use Paginator;
use URL;

class CategoryController extends BackendController
{  
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
     //category rental
    public function listCatRental()
    {
        $cat_rental = CategoryRental::getCatRental();
        return view('admin.category.rental.list', compact('cat_rental'));
    }
    
    //category rental
    public function getCatRentalAdd()
    {   
        $max_order = DB::table('category_rental')
                ->where('is_deleted', ACTIVE)
                ->max('order');
        $order = $max_order + 1;
        return view('admin.category.rental.add', compact('order'));
    }
    
     //category rental
    public function postCatRentalAdd()
    {
        $validator = Validator::make(Input::all(), CategoryRental::$rules, CategoryRental::$messages);
        if($validator->passes()){               
                $set_display = (Input::get('display') == 'on') ? 1 : 0;
                $inputData['name']              = Input::get('name');
                $inputData['display']		= $set_display;               
                $inputData['created_at']	= date('Y-m-d H:i:s');
                $inputData['updated_at']	= date('Y-m-d H:i:s');
                $inputData['order']             = Input::get('order');

                DB::table('category_rental')
                        ->insert($inputData);
                Session::flash('success', '登録が完了しました。');
                return Redirect::route('admin.category.rental.list');
        }

        return Redirect::route('admin.category.rental.add')
                ->with('message'. 'Add category rental fail, try again!')
                ->withErrors($validator)
                ->withInput();  
    }
    
    //category rental
    public function getCatRentalEdit($id)
    {
       $cat_rental = CategoryRental::getCatRentalEdit($id);
       return view('admin.category.rental.edit', compact('cat_rental'));  
    }
    
    //category rental
    public function postCatRentalEdit($id)
    {
        $validator = Validator::make(Input::all(), CategoryRental::$rules, CategoryRental::$messages);
        if($validator->passes()){
                $set_display = (Input::get('display') == 'on') ? 1 : 0;
                $inputData['name']              = Input::get('name');
                $inputData['display']		= $set_display; 
                $inputData['order']             = Input::get('order');
                $inputData['updated_at']	= date('Y-m-d H:i:s');

                DB::table('category_rental')
                        ->where('id', $id)
                        ->update($inputData);
                Session::flash('success', '変更が完了しました。');
                return Redirect::route('admin.category.rental.list');
        }
        return Redirect::to('manage/category/rental/edit/'.$id)
                ->with('message'. 'Edit category rental fail, try again!')
                ->withErrors($validator)
                ->withInput();   
    }
    
    //deletel category rental
    public function delCatRental($id){        
        $chk = RentalProduct::chkCatActive($id);
        if($chk == true)
        {
           DB::table('category_rental')
                ->where('id', '=', $id)
                ->update(array('is_deleted' => INACTIVE));
            Session::flash('success', '削除が完了しました。');
            return Redirect::route('admin.category.rental.list'); 
        }else{
           Session::flash('error', 'このカテゴリは削除できません。');
           return Redirect::route('admin.category.rental.list'); 
        }
    }
    
    //order sort cal rental
    public function orderRental()
    {     
        $id = Input::get('id');
        $order = Input::get('order');
        $action = Input::get('action');
   
        //order up
        if($action == 'up')
        {
           $jOrder = $order - 1;
           $jID = $id - 1;         
           DB::table('category_rental')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder)); 
           
           DB::table('category_rental')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>$jOrder));
        }
        //order down
        if($action == 'down')
        {
           $jOrder = $order + 1;
           $jID = $id + 1;         
           DB::table('category_rental')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder)); 
           
           DB::table('category_rental')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>$jOrder));
        }
        //order top
        if($action == 'top')
        {
            $record_min = DB::table('category_rental')
                    ->where('is_deleted', ACTIVE)
                    ->select('order')
                    ->min('order');
            $orderTop = $record_min - 1;      
            DB::table('category_rental')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderTop)); 
           echo json_encode(array('order'=>$orderTop));
        }
        
        //order last
        if($action == 'last')
        {
            $record_max = DB::table('category_rental')
                    ->where('is_deleted', ACTIVE)
                    ->select('order')
                    ->max('order');
            $orderLast = $record_max + 1;      
            DB::table('category_rental')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderLast)); 
           echo json_encode(array('order'=>$orderLast));
        }

    }
    
    //category sell
    public function listCatSell()
    {
        $cat_sell = CategoryProduct::getCatSell();
        return view('admin.category.sell.list', compact('cat_sell'));
    }
    
    
    //category sell
    public function getCatSellAdd()
    {
        $max_order = DB::table('category_product')
                ->where('is_deleted', ACTIVE)
                ->max('order');
        $order = $max_order + 1;
        return view('admin.category.sell.add', compact('order'));
    }
    
     //category sell
    public function postCatSellAdd()
    {
        $validator = Validator::make(Input::all(), CategoryProduct::$rules, CategoryProduct::$messages);
        if($validator->passes()){
                $set_display = (Input::get('display') == 'on') ? 1 : 0;
                
                $inputData['name']              = Input::get('name');
                $inputData['display']		= $set_display;
                $inputData['order']             = Input::get('order');
                $inputData['created_at']	= date('Y-m-d H:i:s');
                $inputData['updated_at']	= date('Y-m-d H:i:s');

                DB::table('category_product')
                        ->insert($inputData);
                Session::flash('success', '登録が完了しました。');
                return Redirect::route('admin.category.sell.list');
        }
        return Redirect::route('admin.category.sell.add')
                ->with('message'. 'Add category sell fail, try again!')
                ->withErrors($validator)
                ->withInput();  
    }
    
    //category sell
    public function getCatSellEdit($id)
    {
        $cat_sell = CategoryProduct::getCatSellEdit($id);
        return view('admin.category.sell.edit', compact('cat_sell')); 
    }
    
    //category sell
    public function postCatSellEdit($id)
    {
       $validator = Validator::make(Input::all(), CategoryProduct::$rules, CategoryProduct::$messages);
        if($validator->passes()){
                $set_display = (Input::get('display') == 'on') ? 1 : 0;
                $inputData['name']              = Input::get('name');
                $inputData['display']		= $set_display; 
                $inputData['order']		= Input::get('order');
                $inputData['updated_at']	= date('Y-m-d H:i:s');

                DB::table('category_product')
                        ->where('id', $id)
                        ->update($inputData);
                Session::flash('success', '変更が完了しました。');
                return Redirect::route('admin.category.sell.list');
        }
        return Redirect::to('manage/category/sell/edit/'.$id)
                ->with('message'. 'Edit category sell fail, try again!')
                ->withErrors($validator)
                ->withInput();   
    }
  
    //deletel category rental
    public function delCatSell($id)
    {
        $chk = SellProduct::chkCatActive($id);
        if($chk == true)
        {
            DB::table('category_product')
                ->where('id', '=', $id)
                ->update(array('is_deleted' => INACTIVE));
            Session::flash('success', '削除が完了しました。');
            return Redirect::route('admin.category.sell.list'); 
        }else{
           Session::flash('error', 'このカテゴリは削除できません。');
           return Redirect::route('admin.category.sell.list');  
        }
       
    }
    
    //order sort cat sell
    public function orderSell()
    {     
        $id = Input::get('id');
        $order = Input::get('order');
        $action = Input::get('action');
   
        //order up
        if($action == 'up')
        {
           $jOrder = $order - 1;
           $jID = $id - 1;         
           DB::table('category_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder)); 
           
           DB::table('category_product')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>$jOrder));
        }
        //order down
        if($action == 'down')
        {
           $jOrder = $order + 1;
           $jID = $id + 1;         
           DB::table('category_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder));            
           DB::table('category_product')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>'ok'));
        }
        //order top
        if($action == 'top'){
            $record_min = DB::table('category_product')
                    ->where('is_deleted', ACTIVE)
                    ->select('order')
                    ->min('order');
            $orderTop = $record_min - 1;      
            DB::table('category_product')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderTop)); 
           echo json_encode(array('order'=>'ok'));
        }
        
        //order last
        if($action == 'last')
        {
            $record_min = DB::table('category_product')
                    ->where('is_deleted', ACTIVE)
                    ->select('order')
                    ->max('order');
            $orderTop = $record_min + 1;      
            DB::table('category_product')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderTop)); 
           echo json_encode(array('order'=>'ok'));
        }

    }
}

