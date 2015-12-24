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
    //admin cat list
    public static function getCatSell()
    {
        return DB::table(static::$table)
                ->where('is_deleted', ACTIVE)
                //->where('display', 0)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE);
    }
    
    public static function getCatSellFront()
    {
        return DB::table(static::$table)
                ->where('is_deleted', ACTIVE)
                ->where('display', 0)
                ->orderBy('order', 'asc')
                ->paginate(LIMIT_PAGE);
    }

    public static function getCatSellEdit($id)
    {
        return DB::table(static::$table)
                ->where('is_deleted', ACTIVE)
                ->find($id);
    }

    public static function topCatSell()
    {
        return DB::table(static::$table)
                ->where('is_deleted', ACTIVE)
                ->where('display', 0)
                ->orderBy('order', 'asc')
                ->limit(LIMIT_PAGE)
                ->get();
    }
    //check category active status
    public static function chkCatActive($catid)
    {
        $result = DB::table(static::$table)
                ->where('is_deleted', ACTIVE)
                ->where('cat_product_id', $catid)
                ->find($catid);
        if(!empty($result))
            return false;
        return true;
    }
    
}