<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Request;


abstract class BackendController extends BaseController {

    use DispatchesCommands, ValidatesRequests;
    
    public function __construct()
    {

    }

}
