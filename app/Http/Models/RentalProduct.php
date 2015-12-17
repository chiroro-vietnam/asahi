<?php namespace App\Http\Models;
use DB;
use Paginator;

class RentalProduct extends Model {
    protected static $table = 'rental_product';

    public static $rules = array(
        'product_name'    => 'required',
        'show_rate'       => 'required',
    );

    public static $messages = array(
            'product_name.required'	=> 'Please enter rental product',
            'show_rate.required'	=> 'Please choose show rate'
    );

    //get list rental product
    public static function searchRentalPro($cat_rental_id=null){
        return DB::table(static::$table)->where('is_deleted', NO_DELLETE)
                                        ->where('cat_rental_id', $cat_rental_id)
                                        ->paginate(LIMIT_PAGE);                        
    }

    //delete item category rental
    public static function delRentalPro($id){
        return DB::table(static::$table)->where('id', '=', $id)
                                        ->update(array('is_deleted' => DELETED));

    }

    
    //get all rental product
    public static function getAllRentalPro()
    {
        return DB::table(static::$table)->select('id', 'product_name', 'product_name_auxiliary', 'order')
                                        ->where('is_deleted', NO_DELLETE)
                                        ->where('display_top',1)
                                        ->paginate(LIMIT_PAGE);                        
    }
    
//    public function CategoryRental()
//    {
//            return $this->belongsToMany('App\Http\CategoryRental', 'rental_product');
//    }
    
    
        public static function getListRental()
        {
            return DB::table(static::$table)->where('is_deleted', NO_DELLETE)                                        
                                        ->lists('product_name', 'cat_rental_id'); 
        }
    
}