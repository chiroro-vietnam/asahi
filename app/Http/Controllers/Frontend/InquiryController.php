<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\FrontendController;
use App\Http\Models\Inquiry;
use Validator;
use Session;
use Input;
use Redirect;
use Html;
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
        return view('frontend.inquiry.index');
    }
    
    public function postInquiry() 
    {
        $validator = Validator::make(Input::all(), Inquiry::$rules, Inquiry::$messages);
        if($validator->passes()){
            $inputData = [
                'content'       => Input::get('content'),
                'name'          => Input::get('name'),
                'furigana'      => Input::get('furigana'),
                'company'       => Input::get('company'),
                'department'    => Input::get('department'),
                'position'      => Input::get('position'),
                'postalCode1'   => Input::get('postalCode1'),
                'postalCode2'   => Input::get('postalCode2'),
                'state'         => Input::get('state'),
                'address'       => Input::get('address'),
                'phone'         => Input::get('phone'),
                'fax'           => Input::get('fax'),
                'email'         => Input::get('email')
            ];

            Session::put('inputdata', $inputData);
            return Redirect::route('frontend.inquiry.confirm');
        }

        return Redirect::route('frontend.inquiry.index')
                ->with('message'. 'Inquiry sent fail, try again!')
                ->withErrors($validator)
                ->withInput(); 
    }

    public function getConfirm()
    {
        if(empty(Session::get('inputdata')))
        {
          return Redirect::route('frontend.inquiry.index');  
        }
        $data = Session::get('inputdata');
        if(!isset($data)){        
          return Redirect::route('frontend.inquiry.index');  
        }             
        return view('frontend.inquiry.confirm', compact('data'));
    }
    
    public function postConfirm()
    {
        $data = Session::get('inputdata');
        //send email
        Mail::send('frontend.inquiry.email', $data, function($message) use ($data)  {
        $message->to('support@chiroro.com', 'Chiroro-Net Customer Support');
        $message->subject('お問い合わせ');
        $message->from($data['email'], $data['furigana']);
        });
        return Redirect::route('frontend.inquiry.complete');        
    }
    
    public function getComplete()
    {  
        if(empty(Session::get('inputdata')))
        {
          return Redirect::route('frontend.inquiry.index');  
        }
        return view('frontend.inquiry.complete');
        Session::forget('inputdata');
    }
}
