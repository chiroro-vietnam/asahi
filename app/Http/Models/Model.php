<?php namespace App\Http\Models;
use Illuminate\Support\Facades\DB;

class Model{
    protected static $table = '';
    protected static $primary_key = '';
    protected static $active = '';
    protected static $order_by = '';
    protected static $order = 'ASC';

    //for server side validation ONLY
    protected static $rules = array();

    //for server side validation ONLY
    protected static $messages = array();


    public static function get()
    {
        return DB::table(static::$table)->orderBy(static::$order_by, static::$order)->get();
    }

    public static function get_paging($limit = 0)
    {
        return DB::table(static::$table)->orderBy(static::$order_by, static::$order)->paginate($limit);
    }

    public static function find($id)
    {
        return DB::table(static::$table)->find($id);
    }

    public static function add($data)
    {
        return DB::table(static::$table)->insert($data);
    }

    public static function update($id, $data)
    {
        return DB::table(static::$table)
                ->where(static::$primary_key, $id)
                ->update($data);
    }

    public static function delete($id)
    {
        return DB::table(static::$table)->where(static::$primary_key, '=', $id)->delete();
    }

    public static function active($id)
    {
        return DB::table(static::$table)->where(static::$primary_key, '=', $id)->update(array(
            static::$active	=>	ACTIVE
        ));
    }

    public static function deactive($id)
    {
        return DB::table(static::$table)->where(static::$primary_key, '=', $id)->update(array(
            static::$active	=>	INACTIVE
        ));
    }
}
