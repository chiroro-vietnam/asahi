<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;

use Illuminate\Support\Facades\Request;

use Config;

use Redirect;

abstract class FrontendController extends BaseController {

	use DispatchesCommands, ValidatesRequests;
        public function __construct()
	{
            //$curr_route = Request::route()->getName();

        }
	
}
