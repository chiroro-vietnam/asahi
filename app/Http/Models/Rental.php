<?php namespace App\Http\Models;
use App\Http\Models\Rental;
use Illuminate\Support\Facades\URL;
use DB;

class Rental extends Model {
	protected static $table = 'rental';
	protected static $primary_key = 'id';


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

	public static function get_detail(){
		return DB::table(static::$table)->where('is_deleted', '=', NO_DELETE)->paginate(LIMIT_PAGE);
	}
}
