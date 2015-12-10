<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use HTML;
use Redirect;
use Request;
use Form;

class DashboardController extends Controller
{
   
        
    public function index()
    {
        return view('admin.dashboard.index');
    }
}

