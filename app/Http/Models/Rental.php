<?php namespace App\Http\Models;
use App\Http\Models\Rental;
use Illuminate\Support\Facades\URL;
use DB;

class Rental extends Model {
	protected static $table = 'rental_product';

        //get list rental for frontend
	public static function getRental(){
		return DB::table(static::$table)
                        ->select('rental_product.*')
                        ->where('display', 0)
                        ->where('is_deleted', '=', NO_DELLETE)
                        ->paginate(LIMIT_ITEM_PAGE);
	}
        
        //get list rental detail
	public static function getRentalDetail($id){
		return DB::table(static::$table)
                        ->select('rental_product.*')
                        ->where('is_deleted', '=', NO_DELLETE)
                        ->find($id);
	}        

}
