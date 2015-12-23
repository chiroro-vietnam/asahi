<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Models\Rental;
use App\Http\Models\CategoryRental;
use App\Http\Models\RentalProduct;
use App\Http\Controllers\BackendController;
use DB;
use Request;
use Validator;
use Input;
use Redirect;
use Html;
use Session;
use Paginator;
use File;
use Image;
use Json;

class RentalController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    //get rental osusume    
    public function getOsusume()
    {
        //list rental product
        $lrp = RentalProduct::getAllRentalPro();
        return view('admin.rental.osusume', compact('lrp'));
    }
    //update rental osusume order
    public function postOsusume()
    {
        $orders = DB::table('rental_product')
                        ->select('id', 'order')
                        ->where('is_deleted', NO_DELLETE)
                        ->get();

        $orderUpdate = array();
        foreach ($orders as $order){
            $id = $order->id;
            $orderUpdate[$id] = Input::get('order_'.$id);
        }
        
        //update order rental product
        foreach ($orderUpdate as $id => $val) {
                DB::table('rental_product')
                        ->where('id', '=', $id)
                        ->update(array('order' => $val));
        }
        Session::flash('success', 'Order rental product updated successfully.');
        return redirect::route('admin.rental.osusume');
    }
    
    //delete rental osusume
    public function delRenOsusume($id)
    {
        DB::table('rental_product')
                ->where('id', '=', $id)
                ->update(array('is_deleted' => DELETED));
        Session::flash('success', 'The rental product deleted successfully.');
        return redirect::route('admin.rental.osusume');
    }
    
    //product rental list
    public function listProRental()
    {
        $crs = DB::table('category_product')
                        ->where('is_deleted', NO_DELLETE)
                        ->where('display', 1)
                        ->select('id','name')
                        ->get();
        if(Input::has('btmSearchRT'))
        {
           $cr_id = Input::get('cr_id'); 
           $rp = $this->_searchRentPro($cr_id);
           return Redirect::to('manage/product/rental/?cr_id='.$cr_id);
            return view('admin.product.rental.list', compact('rp', 'cr_id', 'crs'));

        }else{
            $cr_id = Input::get('cr_id');
            $rp = $this->_searchRentPro($cr_id);
            return view('admin.product.rental.list', compact('rp', 'cr_id', 'crs'));
        }

    }
    
    //Search rental product
    private function _searchRentPro($cr_id)
    {
        if($cr_id == null)
        {
            return DB::table('rental_product')
                ->where('is_deleted', NO_DELLETE)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE); 
        }else{
            return DB::table('rental_product')
                ->where('is_deleted', NO_DELLETE)
                ->where('cat_rental_id', $cr_id)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE);
        }                
    }

    //product rental add
    public function getProRentalAdd()            
    {
        $cat_rental = DB::table('category_rental')
                ->where('is_deleted', NO_DELLETE)
                ->where('display', 1)
                ->select('id','name')
                ->get();
        return view('admin.product.rental.add', compact('cat_rental'));
    }
    
    //product rental add
    public function postProRentalAdd()
    {
        $validator = Validator::make(Input::all(), RentalProduct::$rules, RentalProduct::$messages);
        if($validator->passes())
            {        
                $display = !empty(Input::get('display')) ? 1 : 0;
                $display_top = !empty(Input::get('display_top')) ? 1 : 0;
                
                $max_order = DB::table('rental_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->max('order');
                 $order = $max_order + 1;
                
                $inputData['product_name']              = Input::get('product_name');
                $inputData['product_name_auxiliary']    = Input::get('product_name_auxiliary');
                $inputData['copy']                      = Input::get('copy');
                $inputData['overview']                  = Input::get('overview');
                $inputData['set_content']               = Input::get('set_content');
                $inputData['annotation']                = Input::get('annotation');
                $inputData['show_rate']                 = Input::get('show_rate');
                $inputData['rental_first_price']        = Input::get('rental_first_price');
                $inputData['rental_one_month_price']    = Input::get('rental_one_month_price');
                $inputData['service_cost']              = Input::get('service_cost');
                $inputData['omotekumi']                 = Input::get('omotekumi');
                $inputData['rental_one_month_price']    = Input::get('rental_one_month_price');                
                $inputData['display']                   = $display;
                $inputData['display_top']		        = $display_top; 
                $inputData['cat_rental_id']		        = Input::get('cat_rental');
                $inputData['order']                     = $order;
                $inputData['updated_at']                = date('Y-m-d H:i:s');                

                $image_first = Input::file('image_first');
                if(Input::file('image_first'))
                {
                    $extension1 = Input::file('image_first')->getClientOriginalExtension(); // getting image extension  
                    $fileName1 = rand(date("Ymd"), time()).".".$extension1;
                    Image::make($image_first->getRealPath())->save(public_path().'/uploads/images/rental_product/'.$fileName1);
                    $inputData['image_first'] = '/uploads/images/rental_product/'.$fileName1;
                }
                
                $image_second = Input::file('image_second');                
                if(Input::file('image_second'))
                {
                    $extension2 = Input::file('image_second')->getClientOriginalExtension(); // getting image extension  
                    $fileName2 = rand(date("Ymd"), time()).".".$extension2;
                    Image::make($image_second->getRealPath())->save(public_path().'/uploads/images/rental_product/'.$fileName2);
                    $inputData['image_second'] = '/uploads/images/rental_product/'.$fileName2;
                }               
                DB::table('rental_product')->insert($inputData);

                 //insert to top_page_show
                if($display_top == 1)
                {
                    $max_id = DB::table('rental_product')                    
                    ->max('rental_product.id');
                    $rental_product_id = $max_id;
                    $dataTopPage  = array(
                        'rental_product_id'   => $rental_product_id,
                        'is_deleted'          => NO_DELLETE,
                        'created_at'          => date('Y-m-d H:i:s'),
                        'updated_at'          => date('Y-m-d H:i:s')); 
                    DB::table('top_page_show')->insert($dataTopPage);
                }               
                
                Session::flash('success', 'The rental product added successfully.');
                return Redirect::route('admin.product.rental.list');
        }

        return Redirect::route('admin.product.rental.add')
                ->with('message'. 'Add rental product fail, try again!')
                ->withErrors($validator)
                ->withInput();  
    }

    //product rental edit
    public function getProRentalEdit($id)
    {
        $data = DB::table('rental_product')               
                ->leftJoin('category_rental', 'rental_product.cat_rental_id', '=', 'category_rental.id')
                ->where('rental_product.id', $id)
                ->where('rental_product.is_deleted', NO_DELLETE)
                ->select('rental_product.*', 'category_rental.name')
                ->get();

                // echo "<pre>";
                // print_r($data);exit;
        return view('admin.product.rental.edit', compact('data'));
    }
    //product rental edit
    public function postProRentalEdit($id)
    {
        $validator = Validator::make(Input::all(), RentalProduct::$ruleEdit, RentalProduct::$messages);
        if($validator->passes())
        {       
            $display = !empty(Input::get('display')) ? 1 : 0;
            $display_top = !empty(Input::get('display_top')) ? 1 : 0;

            $inputData['product_name']              = Input::get('product_name');
            $inputData['product_name_auxiliary']    = Input::get('product_name_auxiliary');
            $inputData['copy']                      = Input::get('copy');
            $inputData['overview']                  = Input::get('overview');
            $inputData['set_content']               = Input::get('set_content');
            $inputData['annotation']                = Input::get('annotation');
            $inputData['show_rate']                 = Input::get('show_rate');
            $inputData['rental_first_price']        = Input::get('rental_first_price');
            $inputData['rental_one_month_price']    = Input::get('rental_one_month_price');
            $inputData['service_cost']              = Input::get('service_cost');
            $inputData['omotekumi']                 = Input::get('omotekumi');
            $inputData['rental_one_month_price']    = Input::get('rental_one_month_price');                
            $inputData['display']                   = $display;
            $inputData['display_top']               = $display_top;
            $inputData['order']                     = Input::get('order');

            $inputData['updated_at']	= date('Y-m-d H:i:s');
            $cr_id = Input::get('cat_rental_id');    
            $image_first = Input::file('image_first');
            $file1 = DB::table('rental_product')->find($id);
            if($file1->image_first){
                    $file1Del = $file1->image_first;
                    if(File::isFile($file1Del)){
                            \File::delete($file1Del);
                    }
            }

            if(Input::file('image_first')){
                    $extension1 = Input::file('image_first')->getClientOriginalExtension(); // getting image extension  
                    $fileName1 = rand(date("Ymd"), time()).".".$extension1;
                    Image::make($image_first->getRealPath())->save(public_path().'/uploads/images/rental_product/'.$fileName1);
                    $inputData['image_first'] = '/uploads/images/rental_product/'.$fileName1;
            }

            $image_second = Input::file('image_second');
            $file2 = DB::table('rental_product')->find($id);
            if($file2->image_second){
                    $file2Del = $file2->image_second;
                    if(File::isFile($file2Del)){
                            \File::delete($file2Del);
                    }
            }

            if(Input::file('image_second')){
                    $extension2 = Input::file('image_second')->getClientOriginalExtension(); // getting image extension  
                    $fileName2 = rand(date("Ymd"), time()).".".$extension2;
                    Image::make($image_second->getRealPath())->save(public_path().'/uploads/images/rental_product/'.$fileName2);
                    $inputData['image_second'] = '/uploads/images/rental_product/'.$fileName2;
            }
            //update top_show_page
            if($display_top == 1){
                $dataTopPage  = array(                       
                        'top_page_show.is_deleted'          => NO_DELLETE,
                        'top_page_show.updated_at'          => date('Y-m-d H:i:s')); 
            }else{
                $dataTopPage  = array(                     
                          'top_page_show.is_deleted'        => DELETED,
                          'top_page_show.updated_at'        => date('Y-m-d H:i:s'));
                }
            DB::table('top_page_show')
                           ->where('top_page_show.rental_product_id', $id)
                           ->update($dataTopPage);

            DB::table('rental_product')
                    ->where('id', $id)
                    ->update($inputData);
            Session::flash('success', 'The rental product updated successfully.');
            return Redirect::to('manage/product/rental/?cr_id='.$cr_id);
        }

        return Redirect::to('manage/product/rental/edit/'.$id)
                ->with('message'. 'Edit rental product fail, try again!')
                ->withErrors($validator)
                ->withInput();  
    }
    
    //product rental delete
    public function delProRental($id)
    {
        $cat_id = DB::table('rental_product')
            ->select('cat_rental_id')
            ->find($id);
        $cr_id = $cat_id->cat_rental_id;
        DB::table('rental_product')
                ->where('id', '=', $id)
                ->update(array('is_deleted' => DELETED));
        return Redirect::to('manage/product/rental/?cr_id='.$cr_id)->with('message', 'Product rental has been deleted successfully');
    }
    
    //order sort rental product
    public function orderSort($cr_id){
        $cr_id = Input::get('cr_id');
        $id = Input::get('id');
        $action = Input::get('action');
        $order = Input::get('order');        
       
        return response()->json(['name' => 'Chiroro', 'state' => 'JP']);
    }

    //order sort rental
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
           DB::table('rental_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder));           
           DB::table('rental_product')
                ->where('id', '=', $jID)
                ->update(array('order' => $order));           
           echo json_encode(array('order'=>$jOrder));
        }
        //order down
        if($action == 'down')
        {
           $jOrder = $order + 1;
           $jID = $id + 1;         
           DB::table('rental_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder));            
           DB::table('rental_product')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>$jOrder));
        }
        //order top
        if($action == 'top'){
            $record_min = DB::table('sell_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->select('order')
                    ->min('order');
            $orderTop = $record_min - 1;      
            DB::table('rental_product')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderTop)); 
           echo json_encode(array('order'=>$orderTop));
        }
        
        //order last
        if($action == 'last')
        {
            $record_max = DB::table('sell_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->select('order')
                    ->max('order');
            $orderLast = $record_max + 1;      
            DB::table('rental_product')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderLast)); 
           echo json_encode(array('order'=>$orderLast));
        }
    }    
  

}

