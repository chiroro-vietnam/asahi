<?php namespace App\Http\Models;
use DB;
use Paginator;

class CategoryRental extends Model {
	protected static $table = 'category_rental';
	
	//get list category rental
	public static function getCatRental()
        {
            return DB::table(static::$table)
                    ->where('is_deleted', NO_DELLETE)
                    ->orderBy('order', 'asc')
                    ->paginate(LIMIT_PAGE);                        
	}
	
	//delete item category rental
	public static function delCateRental($id)
        {
            return DB::table(static::$table)
                    ->where('id', '=', $id)
                    ->update(array('is_deleted' => DELETED));                        
	}
        
        public static function getCatRentalEdit($id)
        {
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
	public static function getAllCatRental()
        {
            return DB::table(static::$table)
                    ->where('is_deleted', '=', NO_DELLETE)
                    ->where('display', 1)
                    ->get();
	}   
        
        public static function topCatRental(){
            return DB::table(static::$table)
                    ->where('is_deleted', NO_DELLETE)
                    ->where('display', 1)
                    ->orderBy('order', 'asc')
                    ->get();                        
	}
       
        
}