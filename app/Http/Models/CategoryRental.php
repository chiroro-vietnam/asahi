<?php namespace App\Http\Models;
use DB;
use Paginator;

class CategoryRental extends Model {
	protected static $table = 'category_rental';
	protected static $primary_key = 'id';
	protected static $order = 'desc';
	
	//get list category rental
	public static function getCatRental(){
		return DB::table(static::$table)->where('is_deleted', NO_DELETE)
                                                ->orderBy('created_at', 'DESC')
                                                ->paginate(LIMIT_PAGE);
                        
	}
	
	//delete item category rental
	public static function delCateRental($id){
		return DB::table(static::$table)->where('id', '=', $id)
										->update(array('is_deleted' => 1));
                        
	}
        
        public static $rules = array(
		'name'    => 'required'
	);

	public static $messages = array(
		'name.required'	=> 'Please enter category rental'
	);
}