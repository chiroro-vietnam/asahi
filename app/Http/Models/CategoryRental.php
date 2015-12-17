<?php namespace App\Http\Models;
use DB;
use Paginator;

class CategoryRental extends Model {
	protected static $table = 'category_rental';
	protected static $primary_key = 'id';
	protected static $order = 'desc';
	
	//get list category rental
	public static function getCatRental(){
		return DB::table(static::$table)
                        ->where('is_deleted', NO_DELLETE)
                        ->orderBy('order', 'ASC')
                        ->paginate(LIMIT_PAGE);
                        
	}
	
	//delete item category rental
	public static function delCateRental($id){
		return DB::table(static::$table)
                        ->where('id', '=', $id)
                        ->update(array('is_deleted' => DELETED));
                        
	}
        public static function getCatRentalEdit($id){
		return DB::table(static::$table)
                        ->where('is_deleted', NO_DELLETE)
                        ->find($id);
                        
	}
        
        public static $rules = array(
		'name'    => 'required'
	);

	public static $messages = array(
		'name.required'	=> 'Please enter category rental'		
	);
      
        //get list category rental join product rental
	public static function getAllCatRental(){

		return DB::table(static::$table)                        
                        //->join('rental_product', 'category_rental.id', '=', 'rental_product.cat_rental_id')
                        //->select('category_rental.id', 'category_rental.name', 'rental_product.cat_rental_id', 'rental_product.product_name')
                        ->where('category_rental.is_deleted', '=', NO_DELLETE)
                        ->get();
	}        
       
        
}