<?php namespace App\Http\Models;
use App\Http\Models\Rental;
use Illuminate\Support\Facades\URL;
use DB;

class Rental extends Model {
	protected static $table = 'rental_product';


//	public static $rules = array(
//			'news_id'	=> 'required',
//			'user_id'	=> 'required',
//			'comment'	=> 'required|min:5',
//	);
//
//	public static $messages = array(
//			'news_id.required'	=> 'Please choose news',
//			'user_id.required'	=> 'Please choose user',
//			'comment.required'	=> 'Please enter comment',
//	);
        //get list rental for frontend
	public static function getRental(){
		return DB::table(static::$table)
                        ->select('rental_product.*')
                        ->where('is_deleted', '=', NO_DELLETE)
                        ->paginate(LIMIT_PAGE);
	}
        
        //get list rental detail
	public static function getRentalDetail($id){
		return DB::table(static::$table)
                        ->select('rental_product.*')
                        ->where('is_deleted', '=', NO_DELLETE)
                        ->find($id);
	}
}
