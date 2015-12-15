<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use App\Http\Models\Inquiry;
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
use Mail;





class InquiryController extends FrontendController
{
    /************************************************************************
    *
    /************************************************************************/
    public function index() 
    {
        Session::forget('inputdata');
        return view('frontend.inquiry.index');
    }
    public function postInquiry() 
    {
        $validator = Validator::make(Input::all(), Inquiry::$rules, Inquiry::$messages);
        if($validator->passes()){                                   
            $inputData['content'] = Input::get('content');
            $inputData['name'] = Input::get('name');
            $inputData['furigana'] = Input::get('furigana');
            $inputData['company'] = Input::get('company');
            $inputData['department'] = Input::get('department');
            $inputData['position'] = Input::get('position');
            $inputData['postalCode1'] = Input::get('postalCode1');
            $inputData['postalCode2'] = Input::get('postalCode2');
            $inputData['state'] = Input::get('dlPrefectures');
            $inputData['address'] = Input::get('address');
            $inputData['phone'] = Input::get('phone');
            $inputData['fax'] = Input::get('fax');
            $inputData['email'] = Input::get('email');

            Session::push('inputdata', $inputData);
            return Redirect::route('frontend.inquiry.confirm');
        }

        return Redirect::route('frontend.inquiry.index')
                ->with('message'. 'Inquiry sent fail, try again!')
                ->withErrors($validator)
                ->withInput(); 
    }

    public function getConfirm()
    {
        $data = Session::get('inputdata');
        if(!isset($data)){
          return Redirect::route('frontend.inquiry.index');  
        }             
        return view('frontend.inquiry.confirm', compact('data'));
    }
    public function postConfirm()
    {
        $data = Session::get('inputdata');
        if(!isset($data))
        {             
            return Redirect::route('frontend.inquiry.index');  
        } 
        

        Mail::send('frontend.inquiry.email', $data, function($message) use ($data)  {
        $message->to('phuong.nd@chiroro.com.vn', 'Chiroro Viet Nam');
        $message->subject('お問い合わせ');
        $message->from($data[0]['email'], $data[0]['furigana']);
        });
        return Redirect::route('frontend.inquiry.complete');
    }

    public function getComplete()
    {
        Session::forget('inputdata');
        return view('frontend.inquiry.complete'); 
    }
}
