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
            'content.required'          => '内容を入力してください',
            'name.required'             => 'お名前入力してください',
            'furigana.required'         => 'ふりがな入力してください',
            'company.required'          => '会社名入力してください',
            'postalCode1.required'      => '郵便番号の接頭辞入力してください',
            'postalCode1.numeric'       => '郵便番号は数値でなければなりません',
            'postalCode2.required'      => '郵便番号を入力してください',
            'postalCode2.numeric'       => '郵便番号は数値でなければなりません',
            'state.required'            => '都道府県を入力してください',
            'address.required'          => 'アドレスを入力してください',
            'phone.required'            => '電話番号を入力してください',
            'fax.required'              => 'FAX番号を入力してください',
            'email.required'            => 'メールアドレスを入力してください',
            'email.email'               => 'メールアドレスが無効です'
    ); 
}    
