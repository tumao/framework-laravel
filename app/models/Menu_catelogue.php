<?php
class Menu_catelogue extends Eloquent
{
	protected $table = 'menu_catelogue';

	protected $fillable = array('name','icon','root','sort','path','created_at','updated_at');

	
}
