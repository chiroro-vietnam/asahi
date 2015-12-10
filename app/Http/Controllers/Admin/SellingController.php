<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use HTML;
use Redirect;
use Request;
use Form;

class SellingController extends Controller
{
   
        
    public function getOsusume()
    {
        return view('admin.sell.osusume');
    }
    
    public function postOsusume()
    {
        
    }
    
    //product sell list
    public function listProSell()
    {
        return view('admin.product.sell.list');
    }
    
    //product sell add
    public function getProSellAdd()
    {
        return view('admin.product.sell.add');
    }
    
    //product sell add
    public function postProSellAdd()
    {
        
    }
    //product sell edit
    public function getProSellEdit()
    {
        return view('admin.product.sell.edit');
    }
    //product sell edit
    public function postProSellEdit()
    {
        
    }    

}

