<?php 
class Permissions extends Eloquent
{
	protected $table = 'permissions';

	protected $fillable = array('code', 'name');
}