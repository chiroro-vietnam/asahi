<?php namespace App\Http\Models;
use DB;
use Paginator;

class RentalProduct extends Model {
    protected static $table = 'rental_product';


    //get list rental product
    public static function searchRentalPro($cat_rental_id=null){
        return DB::table(static::$table)->where('is_deleted', 0)
                                        ->where('cat_rental_id', $cat_rental_id)
                                        ->paginate(LIMIT_PAGE);                        
    }

    //delete item category rental
    public static function delRentalPro($id){
        return DB::table(static::$table)->where('id', '=', $id)
                                        ->update(array('is_deleted' => DELETED));

    }

    public static $rules = array(
            'product_name'    => 'required',
            'show_rate'       => 'required',

    );

    public static $messages = array(
            'product_name.required'	=> 'Please enter rental product',
            'show_rate.required'	=> 'Please choose show rate'
    );
}