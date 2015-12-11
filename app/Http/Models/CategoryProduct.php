<?php namespace App\Http\Models;
use DB;

class CategoryRental extends Model {
	protected $table = 'category_rental';
	protected $primary_key = 'id';
	protected $order = 'desc';

	public function get_cat(){
		return DB::table('category_rental')->where('is_deleted', 0)
                                                    ->orderBy('created_at', 'DESC')
                                                    ->get();
                        
	}
}