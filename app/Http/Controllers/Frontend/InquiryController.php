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
        public function postInquiry() 
        {
           $inputData['content'] = Input::get('txtContent');
            $inputData['name'] = Input::get('txtName');
            $inputData['phonetic'] = Input::get('txtPhonetic');
            $inputData['company'] = Input::get('txtCompany');
            $inputData['department'] = Input::get('txtDepartment');
            $inputData['position'] = Input::get('txtPosition');
            $inputData['posttalcode1'] = Input::get('txtPostalCode1');
            $inputData['postalcode2'] = Input::get('txtPostalCode2');
            $inputData['prefecture'] = Input::get('dlPrefectures');
            $inputData['address'] = Input::get('txtAddress');
            $inputData['phone'] = Input::get('txtPhone');
            $inputData['fax'] = Input::get('txtFax');
            $inputData['email'] = Input::get('txtEmail');
            
             Session::push('inputdata', $inputData);
             
            return view('frontend.inquiry.confirm');
	}
        
        public function getConfirm()
        {
              $items = Session::get('inputdata');
    //          session()->forget('inputdata');
              echo '<pre>';
              var_dump($items);
              return view('frontend.inquiry.confirm');
//              foreach($items as $item)
//              {
//                  
//              }
//            $value = Session::get('content');
//            print $value;
//            exit();

        }
        public function postConfirm()
        {
//            $inputData['content'] = Input::get('txtContent');
//            $inputData['name'] = Input::get('txtName');
//            $inputData['phonetic'] = Input::get('txtPhonetic');
//            $inputData['company'] = Input::get('txtCompany');
//            $inputData['department'] = Input::get('txtDepartment');
//            $inputData['position'] = Input::get('txtPosition');
//            $inputData['posttalcode1'] = Input::get('txtPostalCode1');
//            $inputData['postalcode2'] = Input::get('txtPostalCode2');
//            $inputData['prefecture'] = Input::get('dlPrefectures');
//            $inputData['address'] = Input::get('txtAddress');
//            $inputData['phone'] = Input::get('txtPhone');
//            $inputData['fax'] = Input::get('txtFax');
//            $inputData['email'] = Input::get('txtEmail');
//            
//            Session::push('inputdata', $inputData);
//            return redirect::route('frontend.inquiry.confirm');
        }
}
