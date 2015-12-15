<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;

use Validator;
use Auth;
use Session;
use Input;
use Redirect;
use Html;
use League\Flysystem\Filesystem;
use View;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




class InquiryController extends FrontendController{

	/************************************************************************
	*
	/************************************************************************/
	public function index() 
        {
            return view('frontend.inquiry.index');
	}
        public function postConfirm()
        {

            echo '<pre>';
            print_r(Input::get('dlPrefectures'));exit;
//            print Form::text('content');
//            exit();
            //$inputData['content'] = Input::get('txtContent');
            //$inputData['name'] = Input::get('txtName');
            //Session::put('content', Input::get('txtContent'));
            //Session::push('content_contact',$inputData);
            return redirect::route('frontend.inquiry.confirm');
        }
        public function listConfirm()
        {
//            $value = Session::get('content');
//            print $value;
//            exit();

        }
}
