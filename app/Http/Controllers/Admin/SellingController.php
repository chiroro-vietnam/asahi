<?php
namespace App\Http\Controllers\Admin;
use App\Http\Models\CategoryProduct;
use App\Http\Models\SellProduct;
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

class SellingController extends BackendController
{  
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
   //get sell osusume     
    public function getOsusume()
    {
        //list sell product
        $lsp = SellProduct::getAllSellPro();
        return view('admin.sell.osusume', compact('lsp'));
    }
        //update sell osusume order
    public function postOsusume()
    {
         $orders = DB::table('sell_product')
                        ->select('id', 'order')
                        ->where('is_deleted', NO_DELLETE)
                        ->get();

        $orderUpdate = array();
        foreach ($orders as $order){
            $id = $order->id;
            $orderUpdate[$id] = Input::get('order_'.$id);
        }

        //update order sell product
        foreach ($orderUpdate as $id => $val) {
                DB::table('sell_product')
                        ->where('id', '=', $id)
                        ->update(array('order' => $val));
        }
        Session::flash('success', 'Order sell product updated successfully.');
        return redirect::route('admin.sell.osusume');
    }
    //delete sell osusume
    public function delSellOsusume($id)
    {
        DB::table('sell_product')
                ->where('id', '=', $id)
                ->update(array('is_deleted' => DELETED));
        Session::flash('success', 'The sell product deleted successfully.');
        return redirect::route('admin.sell.osusume');
    }
    
     //product sell add
   public function postProSellAdd($cs_id)
    {
        $validator = Validator::make(Input::all(), SellProduct::$rules, SellProduct::$messages);
        if($validator->passes())
        {             
            $display = !empty(Input::get('display')) ? 1 : 0;
            $display_top = !empty(Input::get('display_top')) ? 1 : 0;
            $open_tab = !empty(Input::get('open_tab')) ? 1 : 0;
            
            $max_order = DB::table('sell_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->max('order');
            $order = $max_order + 1;

            $inputData['display_type']              = Input::get('display_type');

            $inputData['product_name']              = Input::get('product_name');
            $inputData['product_name_auxiliary']    = Input::get('product_name_auxiliary');
            $inputData['copy']                      = Input::get('copy');
            $inputData['overview']                  = Input::get('overview');
            $inputData['set_content']               = Input::get('set_content');
            $inputData['annotation']                = Input::get('annotation');
            $inputData['display_rate']              = Input::get('display_rate');                 
            $inputData['sell_price']                = Input::get('sell_price');
            $inputData['annotation_price']          = Input::get('annotation_price');
            $inputData['omotekumi']                 = Input::get('omotekumi');                
            $inputData['url']                       = Input::get('url');
            $inputData['open_tab']                  = $open_tab;                
            $inputData['display']                   = $display;
            $inputData['display_top']               = $display_top;               
            $inputData['updated_at']                = date('Y-m-d H:i:s');
            $inputData['cat_product_id']            = $cs_id;
            $inputData['order']                     = $order;

           $image_first = Input::file('image_first');             

            if(Input::file('image_first')){
                $extension1 = Input::file('image_first')->getClientOriginalExtension(); // getting image extension  
                $fileName1 = rand(date("Ymd"), time()).".".$extension1;
                Image::make($image_first->getRealPath())->save(public_path().'/uploads/images/sell_product/'.$fileName1);
                $inputData['image_first'] = '/uploads/images/sell_product/'.$fileName1;
            }

            $image_second = Input::file('image_second');

            if(Input::file('image_second'))
            {
                $extension2 = Input::file('image_second')->getClientOriginalExtension(); // getting image extension  
                $fileName2 = rand(date("Ymd"), time()).".".$extension2;
                Image::make($image_second->getRealPath())->save(public_path().'/uploads/images/sell_product/'.$fileName2);
                $inputData['image_second'] = '/uploads/images/sell_product/'.$fileName2;
            }

            $file = Input::file('file');
            if(Input::file('file')){
                    $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension  
                    $fileName = rand(date("Ymd"), time()).".".$extension;
                    $file->move(public_path().'/uploads/files/sell_product/', $fileName);                      
                    $inputData['file'] = '/uploads/files/sell_product/'.$fileName;
            }   

            //insert to top_page_show
            if($display_top == 1)
            {
                $max_id = DB::table('sell_product')                    
                ->max('sell_product.id');
                $sell_product_id = $max_id;
                $dataTopPage  = array(
                    'sell_product_id'   => $sell_product_id,
                    'is_deleted'          => NO_DELLETE,
                    'created_at'          => date('Y-m-d H:i:s'),
                    'updated_at'          => date('Y-m-d H:i:s')); 
                DB::table('top_page_show')->insert($dataTopPage);
            }

            DB::table('sell_product')->insert($inputData);
            Session::flash('success', 'The sell product insert successfully.');
            return Redirect::to('manage/product/sell/?cs_id='.$cs_id);
        }

        return Redirect::to('manage/product/sell/add/'.$cs_id)
                ->with('message'. 'Edit sell product fail, try again!')
                ->withErrors($validator)
                ->withInput();  
    }

      //product sell add
    public function getProSellAdd($cs_id)            
    {
        $cat_sell = DB::table('category_product')
                ->where('is_deleted', NO_DELLETE)
                ->where('display', 1)
                ->select('id','name')->find($cs_id);
        return view('admin.product.sell.add', compact('cs_id', 'cat_sell'));
    }
    
    //product sell list
    public function listProSell($cs_id=null)
    {
        $cs_id = Input::get('cs_id');
        if($cs_id != null){
            $csp = DB::table('category_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->where('display', 1)
                    ->lists('name', 'id');
            $sp = $this->_searchSellPro($cs_id);
            return view('admin.product.sell.list', compact('sp', 'cs_id', 'csp'));            
        }  else {
            $csp = DB::table('category_product')
                    ->where('is_deleted', NO_DELLETE)
                    ->where('display', 1)
                    ->lists('name', 'id');
            if(Input::has('btmSearchSP'))
            {            
               $cs_id = Input::get('cat_sell');
               $sp = $this->_searchSellPro($cs_id);
               return Redirect::to('admin/product/sell/?cs_id='.$cs_id);
               return view('admin.product.sell.list', compact('sp', 'cs_id', 'csp'));
            }else{
            return view('admin.product.sell.list', compact('csp'));
            }
        }
    }
    
     //Search rental product
    private function _searchSellPro($cat_product_id)
    {
        return DB::table('sell_product')
                ->where('is_deleted', NO_DELLETE)
                ->where('cat_product_id', $cat_product_id)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE);        
    }   
    
    //product sell edit
    public function getProSellEdit($id)
    {       
        $sp = DB::table('sell_product')
                ->where('sell_product.id', $id)
                ->leftJoin('category_product', 'sell_product.cat_product_id', '=', 'category_product.id')
                ->select('sell_product.*', 'category_product.name')
                ->get();
        return view('admin.product.sell.edit', compact('sp', 'id'));
    }
    
    //product sell edit
    public function postProSellEdit()
    {
        $id = Input::get('id');
        $cs_id = Input::get('cat_product_id');

        $validator = Validator::make(Input::all(), SellProduct::$ruleEdit, SellProduct::$messages);
        if($validator->passes()){                  
                $display = !empty(Input::get('display')) ? 1 : 0;
                $display_top = !empty(Input::get('display_top')) ? 1 : 0;
                $open_tab = !empty(Input::get('open_tab')) ? 1 : 0;
                
                $inputData['display_type']              = Input::get('display_type');                
                $inputData['product_name']              = Input::get('product_name');
                $inputData['product_name_auxiliary']    = Input::get('product_name_auxiliary');
                $inputData['copy']                      = Input::get('copy');
                $inputData['overview']                  = Input::get('overview');
                $inputData['set_content']               = Input::get('set_content');
                $inputData['annotation']                = Input::get('annotation');
                $inputData['display_rate']              = Input::get('display_rate');                
                $inputData['sell_price']                = Input::get('sell_price');
                $inputData['annotation_price']          = Input::get('annotation_price');
                $inputData['omotekumi']                 = Input::get('omotekumi');                
                $inputData['url']                       = Input::get('url');
                $inputData['open_tab']                  = $open_tab;                
                $inputData['display']                   = $display;
                $inputData['display_top']		= $display_top;
                $inputData['order']                     = Input::get('order');
                $inputData['updated_at']                = date('Y-m-d H:i:s');
                
                $cs_id          = Input::get('cat_product_id');    
                $image_first    = Input::file('image_first');
                
                $file1 = DB::table('rental_product')->find($id);
                
                if(!empty($file1))
                {
                    if($file1->image_first){
                            $file1Del = $file1->image_first;
                            if(File::isFile($file1Del)){
                                    \File::delete($file1Del);
                            }
                    }
                }

                if(Input::file('image_first')){
                        $extension1 = Input::file('image_first')->getClientOriginalExtension(); // getting image extension  
                        $fileName1 = rand(date("Ymd"), time()).".".$extension1;
                        Image::make($image_first->getRealPath())->save(public_path().'/uploads/images/sell_product/'.$fileName1);
                        $inputData['image_first'] = '/uploads/images/sell_product/'.$fileName1;
                }
                
                $image_second = Input::file('image_second');
                $file2 = DB::table('rental_product')->find($id);
                if(!empty($file1))
                {
                    if($file2->image_second){
                            $file2Del = $file2->image_second;
                            if(File::isFile($file2Del)){
                                    \File::delete($file2Del);
                            }
                    }
                }

                if(Input::file('image_second')){
                        $extension2 = Input::file('image_second')->getClientOriginalExtension(); // getting image extension  
                        $fileName2 = rand(date("Ymd"), time()).".".$extension2;
                        Image::make($image_second->getRealPath())->save(public_path().'/uploads/images/sell_product/'.$fileName2);
                        $inputData['image_second'] = '/uploads/images/sell_product/'.$fileName2;
                }
                
                $file = Input::file('file');
                if(Input::file('file')){
                        $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension  
                        $fileName = rand(date("Ymd"), time()).".".$extension;
                        $file->move(public_path().'/uploads/files/sell_product/', $fileName);                      
                        $inputData['file'] = '/uploads/files/sell_product/'.$fileName;
                }

                if($display_top == 1)
                {
                    $dataTopPage  = array(                       
                            'top_page_show.is_deleted'          => NO_DELLETE,
                            'top_page_show.updated_at'          => date('Y-m-d H:i:s')); 
                }else{
                    $dataTopPage  = array(                     
                            'top_page_show.is_deleted'        => DELETED,
                            'top_page_show.updated_at'        => date('Y-m-d H:i:s'));
                }
                DB::table('top_page_show')
                               ->where('top_page_show.sell_product_id', $id)
                               ->update($dataTopPage);               


                DB::table('sell_product')
                        ->where('id', $id)
                        ->update($inputData);
                Session::flash('success', 'The sell product updated successfully.');
                return Redirect::to('manage/product/sell/?cs_id='.$cs_id);
        }

        return Redirect::to('manage/product/sell/edit/'.$id)
                ->with('message'. 'Edit sell product fail, try again!')
                ->withErrors($validator)
                ->withInput();  
        
    } 
    
    //order sort sell
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
           DB::table('sell_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder)); 
           
           DB::table('sell_product')
                ->where('id', '=', $jID)
                ->update(array('order' => $order)); 
           echo json_encode(array('order'=>$jOrder));
        }
        //order down
        if($action == 'down')
        {
           $jOrder = $order + 1;
           $jID = $id + 1;         
           DB::table('sell_product')
                ->where('id', '=', $id)
                ->update(array('order' => $jOrder));            
           DB::table('sell_product')
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
            DB::table('sell_product')
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
            DB::table('sell_product')
                 ->where('id', '=', $id)
                 ->update(array('order' => $orderLast)); 
           echo json_encode(array('order'=>$orderLast));
        }
    }
}

