<?php namespace App\Http\Models;
use DB;
use Paginator;

class RentalProduct extends Model {
    protected static $table = 'rental_product';

    public static $rules = array(
        'cat_rental'      => 'required',
        'product_name'    => 'required',
        'show_rate'       => 'required',
    );

    public static $ruleEdit = array(
        'product_name'    => 'required',
        'show_rate'       => 'required',
    );

    public static $messages = array(
            'cat_rental.required'     => 'Please choose category',
            'product_name.required'	    => 'Please enter rental product',
            'show_rate.required'        => 'Please choose show rate'
    );

    //get list rental product
    public static function searchRentalPro($cat_rental_id=null)
    {
        return DB::table(static::$table)->where('is_deleted', NO_DELLETE)
                                        ->where('cat_rental_id', $cat_rental_id)
                                        ->paginate(LIMIT_PAGE);                        
    }

    //delete item category rental
    public static function delRentalPro($id)
    {
        return DB::table(static::$table)->where('id', '=', $id)
                                        ->update(array('is_deleted' => DELETED));

    }

    
    //get all rental product
    public static function getAllRentalPro()
    {
        return DB::table(static::$table)->select('id', 'product_name', 'product_name_auxiliary', 'order')
                                        ->where('is_deleted', NO_DELLETE)
                                        ->where('display',0)
                                        ->where('display_top',1)
                                        ->paginate(LIMIT_PAGE);                        
    }
    
    
    public static function getListRental()
    {
        return DB::table(static::$table)
                ->where('is_deleted', NO_DELLETE)
                ->where('display',0)
                ->select('id', 'product_name', 'cat_rental_id', 'display')
                ->get(); 
    }
    
}