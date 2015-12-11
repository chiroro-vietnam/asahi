<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::group(array('namespace' => 'Admin'), function () {
    
    //product osusume rental
    Route::get('admin/rental', array('as' => 'admin.rental', 'uses' => 'RentalController@index'));
    Route::post('admin/rental', array('as' => 'admin.rental', 'uses' => 'RentalController@postindex'));
    
    // admin
    Route::get('admin', array('as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index'));
    Route::get('admin/dashboard', array('as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index'));
    
    //product osusume rental
    Route::get('admin/product/osusume-sell', array('as' => 'admin.sell.osusume', 'uses' => 'SellingController@getOsusume'));
    Route::post('admin/product/osusume-sell', array('as' => 'admin.sell.osusume', 'uses' => 'SellingController@postOsusume'));
    
    //product osusume sell
    Route::get('admin/product/osusume-rental', array('as' => 'admin.rental.osusume', 'uses' => 'RentalController@getOsusume'));
    Route::post('admin/product/osusume-rental', array('as' => 'admin.rental.osusume', 'uses' => 'RentalController@postOsusume'));
    

    //category rental list
    Route::get('admin/category/rental', array('as' => 'admin.category.rental.list', 'uses' => 'CategoryController@listCatRental'));
    Route::get('admin/category/rental/add', array('as' => 'admin.category.rental.add', 'uses' => 'CategoryController@getCatRentalAdd'));
    Route::post('admin/category/rental/add', array('as' => 'admin.category.rental.add', 'uses' => 'CategoryController@postCatRentalAdd'));
    Route::get('admin/category/rental/edit', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@getCatRentalEdit'));
    Route::post('admin/category/rental/edit', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@postCatRentalEdit'));
    Route::get('admin/category/rental/del/{id}', array('as' => 'admin.category.rental.del', 'uses' => 'CategoryController@delCatRental'));
    

    //category sell list
    Route::get('admin/category/sell', array('as' => 'admin.category.sell.list', 'uses' => 'CategoryController@listCatSell'));
    Route::get('admin/category/sell/add', array('as' => 'admin.category.sell.add', 'uses' => 'CategoryController@getCatSellAdd'));
    Route::post('admin/category/sell/add', array('as' => 'admin.category.sell.add', 'uses' => 'CategoryController@postCatSellAdd'));
    Route::get('admin/category/sell/edit', array('as' => 'admin.category.sell.edit', 'uses' => 'CategoryController@getCatSellEdit'));
    Route::post('admin/category/sell/edit', array('as' => 'admin.category.sell.edit', 'uses' => 'CategoryController@postSellEdit'));

    //product sell
    Route::get('admin/product/sell', array('as' => 'admin.product.sell.list', 'uses' => 'SellingController@listProSell'));
    Route::get('admin/product/sell/add', array('as' => 'admin.product.sell.add', 'uses' => 'SellingController@getProSellAdd'));
    Route::post('admin/product/sell/add', array('as' => 'admin.product.sell.add', 'uses' => 'SellingController@postProSellAdd'));
    Route::get('admin/product/sell/edit', array('as' => 'admin.product.sell.edit', 'uses' => 'SellingController@getProSellEdit'));
    Route::post('admin/product/sell/edit', array('as' => 'admin.product.sell.edit', 'uses' => 'SellingController@postProSellEdit'));
    
    //product rental
    Route::get('admin/product/rental/', array('as' => 'admin.product.rental.list', 'uses' => 'RentalController@listProRental'));
    //Route::get('admin/product/rental/{cr_id}', array('as' => 'admin.product.rental.list', 'uses' => 'RentalController@listProRental'));
    Route::post('admin/product/rental/', array('as' => 'admin.product.rental.list', 'uses' => 'RentalController@listProRental'));
   
    Route::get('admin/product/rental/add/{cr_id}', array('as' => 'admin.product.rental.add', 'uses' => 'RentalController@getProRentalAdd'));    
    Route::post('admin/product/rental/add/{cr_id}', array('as' => 'admin.product.rental.add', 'uses' => 'RentalController@postProRentalAdd'));
    Route::get('admin/product/rental/edit/{id}', array('as' => 'admin.product.rental.edit', 'uses' => 'RentalController@getProRentalEdit'));
    Route::post('admin/product/rental/edit/{id}', array('as' => 'admin.product.rental.edit', 'uses' => 'RentalController@postProRentalEdit'));
    Route::get('admin/product/rental/del/{id}', array('as' => 'admin.product.rental.del', 'uses' => 'RentalController@delProRental'));
    
});

