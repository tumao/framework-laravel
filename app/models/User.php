<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
/*use Illuminate\Database\Eloquent\SoftDeletingTrait;*/

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait/*, SoftDeletingTrait*/;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token', 'updated_at', 'created_at');

	protected $fillable = array('name', 'email', 'password', 'real_name','activated', 'created_at', 'updated_at');

	// protected $dates = ['deleted_at'];


	
	/**
	 * 关联user_group表.
	 *
	 * @return obj
	 */
	public function group()
	{
		return $this->hasOne('User_group');
	}

}
