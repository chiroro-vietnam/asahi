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

//Frontend
Route::group(array('namespace' => 'Frontend'), function () {
    //homepage
    Route::get('/', ['as' => 'frontend.homepage', 'uses' => 'HomepageController@index']);
    
    //search
    Route::get('/search', ['as' => 'frontend.search', 'uses' => 'SearchController@search']);
    Route::post('/search', ['as' => 'frontend.search', 'uses' => 'SearchController@search']);
        
    //rental
    Route::get('rental/', ['as' => 'frontend.rental.list', 'uses' => 'RentalController@index']);
    Route::get('rental/detail/{id}', ['as' => 'frontend.rental.detail', 'uses' => 'RentalController@rentalDetail']);    
    Route::get('rental/agree', ['as' => 'frontend.rental.agree', 'uses' => 'RentalController@rentalAgree']);
  
    //product
    Route::get('product/', ['as' => 'frontend.product.list', 'uses' => 'ProductController@index']);
    Route::get('product/detail/{id?}', ['as' => 'frontend.product.detail', 'uses' => 'ProductController@productDetail']);
    
    //maker
    Route::get('maker/', ['as' => 'frontend.maker.list', 'uses' => 'MakerController@index']);
    
    //Company
    Route::get('company/', ['as' => 'frontend.company.index', 'uses' => 'CompanyController@index']);
    
    //Inquiry
    Route::get('inquiry/', ['as' => 'frontend.inquiry.index', 'uses' => 'InquiryController@index']);
    Route::post('inquiry/', ['as' => 'frontend.inquiry.index', 'uses' => 'InquiryController@postInquiry']);
    Route::get('inquiry/confirm', ['as' => 'frontend.inquiry.confirm', 'uses' => 'InquiryController@getConfirm']);
    Route::post('inquiry/confirm', ['as' => 'frontend.inquiry.confirm', 'uses' => 'InquiryController@postConfirm']);
    Route::get('inquiry/complete', ['as' => 'frontend.inquiry.complete', 'uses' => 'InquiryController@getComplete']);
    
   //site map
    Route::get('sitemap/', ['as' => 'frontend.sitemap.index', 'uses' => 'SitemapController@siteMap']);
    
});

//login and logout
Route::get('admin/login', ['as' => 'admin.auth.login', 'uses' => 'admin\AdminController@getLogin']);
Route::post('admin/login', ['as' => 'admin.auth.login', 'uses' => 'admin\AdminController@postLogin']);
Route::get('admin/logout', ['as' => 'admin.auth.logout', 'uses' => 'admin\AdminController@logout']);

//Admin
Route::group(array('namespace' => 'Admin'), function () {
    
    //product osusume rental
    Route::get('admin/rental', array('as' => 'admin.rental', 'uses' => 'RentalController@index'));
    Route::post('admin/rental', array('as' => 'admin.rental', 'uses' => 'RentalController@postindex'));
    
    // admin
    Route::get('admin', array('as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index'));
    Route::get('admin/dashboard', array('as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index'));
    
    //product osusume sell
    Route::get('admin/product/osusume-sell', array('as' => 'admin.sell.osusume', 'uses' => 'SellingController@getOsusume'));
    Route::post('admin/product/osusume-sell', array('as' => 'admin.sell.osusume', 'uses' => 'SellingController@postOsusume'));
    Route::get('admin/product/osusume-sell/del/{id}', array('as' => 'admin.sell.osusume.del', 'uses' => 'SellingController@delSellOsusume'));
    
    //product osusume rental
    Route::get('admin/product/osusume-rental', array('as' => 'admin.rental.osusume', 'uses' => 'RentalController@getOsusume'));
    Route::post('admin/product/osusume-rental', array('as' => 'admin.rental.osusume', 'uses' => 'RentalController@postOsusume'));
    Route::get('admin/product/osusume-rental/del/{id}', array('as' => 'admin.rental.osusume.del', 'uses' => 'RentalController@delRenOsusume'));

    //category rental list
    Route::get('admin/category/rental', array('as' => 'admin.category.rental.list', 'uses' => 'CategoryController@listCatRental'));
    Route::get('admin/category/rental/add', array('as' => 'admin.category.rental.add', 'uses' => 'CategoryController@getCatRentalAdd'));
    Route::post('admin/category/rental/add', array('as' => 'admin.category.rental.add', 'uses' => 'CategoryController@postCatRentalAdd'));
    Route::get('admin/category/rental/edit', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@getCatRentalEdit'));
    Route::post('admin/category/rental/edit', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@postCatRentalEdit'));
    Route::get('admin/category/rental/del/{id}', array('as' => 'admin.category.rental.del', 'uses' => 'CategoryController@delCatRental'));
    Route::get('admin/category/rental/edit/{id?}', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@getCatRentalEdit'));
    Route::post('admin/category/rental/edit/{id?}', array('as' => 'admin.category.rental.edit', 'uses' => 'CategoryController@postCatRentalEdit'));
    //sort order cat rental
    Route::get('admin/category/rental/order', array('as' => 'admin.category.rental.order', 'uses' => 'CategoryController@orderRental'));
    
    //category sell list
    Route::get('admin/category/sell', array('as' => 'admin.category.sell.list', 'uses' => 'CategoryController@listCatSell'));
    Route::get('admin/category/sell/add', array('as' => 'admin.category.sell.add', 'uses' => 'CategoryController@getCatSellAdd'));
    Route::post('admin/category/sell/add', array('as' => 'admin.category.sell.add', 'uses' => 'CategoryController@postCatSellAdd'));
    Route::get('admin/category/sell/edit/{id?}', array('as' => 'admin.category.sell.edit', 'uses' => 'CategoryController@getCatSellEdit'));
    Route::post('admin/category/sell/edit/{id?}', array('as' => 'admin.category.sell.edit', 'uses' => 'CategoryController@postCatSellEdit'));
    Route::get('admin/category/sell/del/{id?}', array('as' => 'admin.category.sell.del', 'uses' => 'CategoryController@delCatSell'));
    //sort order cat sell
    Route::get('admin/category/sell/order', array('as' => 'admin.category.sell.order', 'uses' => 'CategoryController@orderSell'));
    
    //product sell
    Route::get('admin/product/sell', array('as' => 'admin.product.sell.list', 'uses' => 'SellingController@listProSell'));
    Route::post('admin/product/sell', array('as' => 'admin.product.sell.list', 'uses' => 'SellingController@listProSell'));
    Route::get('admin/product/sell/add/{cs_id?}', array('as' => 'admin.product.sell.add', 'uses' => 'SellingController@getProSellAdd'));
    Route::post('admin/product/sell/add/{cs_id}', array('as' => 'admin.product.sell.add', 'uses' => 'SellingController@postProSellAdd'));
    Route::get('admin/product/sell/edit/{id?}', array('as' => 'admin.product.sell.edit', 'uses' => 'SellingController@getProSellEdit'));
    Route::post('admin/product/sell/edit/{id?}', array('as' => 'admin.product.sell.edit', 'uses' => 'SellingController@postProSellEdit'));
    Route::get('admin/product/sell/add/{cs_id}', array('as' => 'admin.product.sell.add', 'uses' => 'SellingController@getProSellAdd'));
    Route::get('admin/product/sell/order', array('as' => 'admin.product.sell.order', 'uses' => 'SellingController@orderSell'));    
    
    //product rental
    Route::get('admin/product/rental/', array('as' => 'admin.product.rental.list', 'uses' => 'RentalController@listProRental'));
    Route::post('admin/product/rental/', array('as' => 'admin.product.rental.list', 'uses' => 'RentalController@listProRental'));
          
    Route::get('admin/product/rental/add/{cr_id}', array('as' => 'admin.product.rental.add', 'uses' => 'RentalController@getProRentalAdd'));    
    Route::post('admin/product/rental/add/{cr_id}', array('as' => 'admin.product.rental.add', 'uses' => 'RentalController@postProRentalAdd'));
    Route::get('admin/product/rental/edit/{id}', array('as' => 'admin.product.rental.edit', 'uses' => 'RentalController@getProRentalEdit'));
    Route::post('admin/product/rental/edit/{id}', array('as' => 'admin.product.rental.edit', 'uses' => 'RentalController@postProRentalEdit'));
    Route::get('admin/product/rental/del/{id}', array('as' => 'admin.product.rental.del', 'uses' => 'RentalController@delProRental'));
    Route::get('admin/product/rental/order', array('as' => 'admin.product.rental.order', 'uses' => 'RentalController@orderRental'));
});

Route::get('auth/login', function () {
        return redirect()->route('admin.auth.login');
    });
