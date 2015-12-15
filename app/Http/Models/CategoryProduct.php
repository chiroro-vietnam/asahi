<?php namespace App\Http\Models;
use DB;
use Paginator;

class CategoryProduct extends Model {
	protected static $table = 'category_product';
	protected static $primary_key = 'id';
        
        public static $rules = array(
		'name'    => 'required'
	);

	public static $messages = array(
		'name.required'	=> 'Please enter category sell'		
	);

	public static function getCatSell(){
		return DB::table(static::$table)
                        ->where('is_deleted', NO_DELLETE)
                        ->orderBy('order', 'ASC')
                        ->paginate(LIMIT_PAGE);
                        
	}
        
        public static function getCatSellEdit($id){
		return DB::table(static::$table)
                        ->where('is_deleted', NO_DELLETE)
                        ->find($id);
                        
	}
         
}