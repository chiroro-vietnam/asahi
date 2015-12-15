<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	protected $table = 'users';
	protected $fillable = ['username', 'email', 'password'];
	protected $hidden = ['password', 'remember_token'];

	public static $rules = array(
								'username'				=> 'required',
								'email'					=> 'required|email|unique:users,email',
								'password'				=> 'required|min:6',
								'confirm_password'	=> 'required|same:password',
								'avatar'					=> 'required|max:5000|image|mimes:jpeg,jpg,bmp,png,gif',
								'first_name'			=> 'required',
								'last_name'			=> 'required',
								'birthday'				=> 'required|date',
								'phone'					=> 'required|numeric',
								'address'				=> 'required',
								'city'						=> 'required',
								'zipcode'				=> 'required',
								'note'						=> 'required',
								'state'					=> 'required',
							);
	public static $rulesEdit = array(
								'username'				=> 'required',
								'email'					=> 'required|email|unique:users,email',
								'password'				=> 'required|min:6',
								'confirm_password'	=> 'required|same:password',
								'avatar'					=> 'image|mimes:jpeg,png,gif',
								'first_name'			=> 'required',
								'last_name'			=> 'required',
								'birthday'				=> 'required|date',
								'phone'					=> 'required|numeric',
								'address'				=> 'required',
								'city'						=> 'required',
								'zipcode'				=> 'required',
								'note'						=> 'required',
								'state'					=> 'required',
							);

	public static $messages = array(
		'username.required'				=> 'Please enter username',
		'email.required'						=> 'Please enter email',
		'email.email'							=> 'please enter correct format email',
		'email.unique'							=> 'The email existed, try again!',
		'password.required'					=> 'Please enter password',
		'password.min'						=> 'Password must be length least 6 characters',
		'confirm_password.required'	=> 'Password and confirm password not same.',
		'confirm_password.same'		=> 'Password and confirm password not same.',
	);


	public static $ruleLogin = array(
								'email'			=> 'required',
								'password'		=> 'required',
							);

	public static $msgLogin = array(
		'email.required'				=> 'Please enter user id',
		'password.required'			=> 'Please enter password',
	);


}
