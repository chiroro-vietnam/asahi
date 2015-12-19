<?php namespace App\Http\Models;
use DB;
use Paginator;

class CategoryProduct extends Model {
    protected static $table = 'category_product';

    public static $rules = array(
            'name'    => 'required'
    );

    public static $messages = array(
            'name.required'	=> 'Please enter category sell'		
    );

    public static function getCatSell()
    {
        return DB::table(static::$table)
                ->where('is_deleted', NO_DELLETE)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE);

    }

    public static function getCatSellEdit($id)
    {
        return DB::table(static::$table)
                ->where('is_deleted', NO_DELLETE)
                ->find($id);

    }

    public static function topCatSell()
    {
        return DB::table(static::$table)
                ->where('is_deleted', NO_DELLETE)
                ->where('display', 1)
                ->orderBy('order', 'asc')
                ->limit(LIMIT_PAGE)
                ->get();
    }
    
}