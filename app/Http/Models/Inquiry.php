<?php namespace App\Http\Models;

class Inquiry extends Model {

    public static $rules = array(
            'content'                   => 'required',
            'name'                      => 'required',
            'furigana'                  => 'required',
            'company'                   => 'required',
            'postalCode1'               => 'required|numeric',
            'postalCode2'               => 'required|numeric',
            'state'                     => 'required',
            'address'                   => 'required',
            'phone'                     => 'required',
            'fax'                       => 'required',
            'email'                     => 'required|email'
        
    );

    public static $messages = array(
            'content.required'          => 'Please enter content',
            'name.required'             => 'Please enter name',
            'furigana.required'         => 'Please kana name',
            'company.required'          => 'Please company name',
            'postalCode1.required'      => 'Please enter post code 1',
            'postalCode1.numeric'      => 'The post code 1 must be numeric',
            'postalCode2.required'      => 'Please enter post code 2',
            'postalCode2.numeric'      => 'The post code 2 must be numeric',
            'state.required'            => 'Please enter state',
            'address.required'          => 'Please address',
            'phone.required'            => 'Please enter phone number',
            'fax.required'              => 'Please fax number',
            'email.required'            => 'Please enter email',
            'email.email'               => 'Please enter correct format email'
    ); 
}    
